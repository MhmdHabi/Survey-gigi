<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyResponse;
use App\Models\SurveyResult;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;

class SurveyResultController extends Controller
{
    public function showSurveyResults($surveyId, $surveyResponId)
    {
        $surveyResponses = SurveyResult::with(['survey', 'user', 'question', 'answer', 'survey_response.image']) // Eager load image
            ->where('survey_id', $surveyId)
            ->where('survey_respon_id', $surveyResponId)
            ->get();

        return view('admin.result.show', compact('surveyResponses'));
    }

    public function export()
    {
        $surveyResponses = SurveyResponse::with(['survey', 'user', 'image'])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header dengan styling
        $headers = [
            'Judul Survei',
            'Inisial Orang Tua',
            'Inisial Anak',
            'Tanggal Lahir Anak',
            'Umur',
            'Jenis Kelamin',
            'Hasil',
            'Kriteria', // Menambahkan kolom Kriteria
            'Keterangan Survey Gambar',
            'Keterangan Nilai Gambar'
        ];

        $columnIndex = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($columnIndex . '1', $header);
            $sheet->getStyle($columnIndex . '1')->getFont()->setBold(true);
            $sheet->getStyle($columnIndex . '1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getColumnDimension($columnIndex)->setAutoSize(true); // Set auto width
            $columnIndex++;
        }

        // Populate data
        $row = 2; // Start at the second row
        foreach ($surveyResponses as $response) {
            $sheet->setCellValue('A' . $row, $response->survey->title);

            // Get initials for parent's name
            $parentInitials = $this->getInitials($response->user->name);
            $sheet->setCellValue('B' . $row, $parentInitials);

            // Get initials for child's name
            $childInitials = $this->getInitials($response->child_name);
            $sheet->setCellValue('C' . $row, $childInitials);

            $sheet->setCellValue('D' . $row, $response->birth_date);
            $sheet->setCellValue('E' . $row, \Carbon\Carbon::parse($response->birth_date)->diffInYears(now()));
            $sheet->setCellValue('F' . $row, $response->gender);
            // Format hasil to two decimal places
            $sheet->setCellValue('G' . $row, number_format($response->hasil, 2) . '%');

            // Determine the kriteria
            if ($response->hasil >= 76) {
                $kriteria = 'Baik';
            } elseif ($response->hasil >= 56) {
                $kriteria = 'Cukup';
            } else {
                $kriteria = 'Kurang';
            }

            $sheet->setCellValue('H' . $row, $kriteria);
            $sheet->setCellValue('I' . $row, $response->image ? $response->image->keterangan : 'Tidak ada gambar');
            $sheet->setCellValue('J' . $row, $response->image ? $response->image->nilai_image : 'Tidak ada gambar');
            $row++;
        }

        // Styling keseluruhan untuk header
        $sheet->getStyle('A1:J1')->getFont()->setName('Times New Roman')->setSize(12); // Mengatur font dan ukuran untuk header
        $sheet->getStyle('A1:J' . ($row - 1))->getBorders()->getOutline()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

        // Save to file
        $writer = new Xlsx($spreadsheet);
        $filename = 'hasil_survei_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Output to browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function exportCsv()
    {
        $surveyResponses = SurveyResponse::with(['survey', 'user', 'image'])->get();

        // Nama file CSV
        $filename = 'hasil_survei_' . date('Y-m-d_H-i-s') . '.csv';

        // Output ke browser
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // Set header untuk CSV
        fputcsv($output, [
            'Judul Survei',
            'Inisial Orang Tua',
            'Inisial Anak',
            'Tanggal Lahir Anak',
            'Umur',
            'Jenis Kelamin',
            'Hasil',
            'Kriteria', // Menambahkan kolom Kriteria
            'Keterangan Survey Gambar',
            'Keterangan Nilai Gambar'
        ]);

        // Populate data
        foreach ($surveyResponses as $response) {
            // Menentukan Kriteria berdasarkan hasil
            if ($response->hasil >= 76) {
                $kriteria = 'Baik';
            } elseif ($response->hasil >= 56) {
                $kriteria = 'Cukup';
            } else {
                $kriteria = 'Kurang';
            }

            fputcsv($output, [
                $response->survey->title,
                $this->getInitials($response->user->name),
                $this->getInitials($response->child_name),
                $response->birth_date,
                \Carbon\Carbon::parse($response->birth_date)->diffInYears(now()),
                $response->gender,
                number_format($response->hasil, 2) . '%', // Format hasil to two decimal places
                $kriteria,
                $response->image ? $response->image->keterangan : 'Tidak ada gambar',
                $response->image ? $response->image->nilai_image : 'Tidak ada gambar'
            ]);
        }

        fclose($output);
        exit;
    }



    private function getInitials($name)
    {
        $parts = explode(' ', $name);
        $initials = '';

        foreach ($parts as $part) {
            if (!empty($part)) {
                $initials .= strtoupper($part[0]); // Ambil huruf pertama dan ubah ke huruf kapital
            }
        }

        return $initials;
    }
}
