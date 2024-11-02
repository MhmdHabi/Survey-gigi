<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {

        $artikels = Artikel::all(); // Atau Anda bisa menggunakan `Artikel::latest()->get();` untuk mendapatkan artikel terbaru

        // Kirim data ke tampilan
        return view('artikel.artikel', compact('artikels'));
    }
    public function artikel()
    {
        // Mengambil semua artikel dari database
        $artikels = Artikel::all();

        // Mengirim data artikel ke tampilan
        return view('admin.artikel.artikel', compact('artikels'));
    }
    public function create()
    {

        return view('admin.artikel.add-artikel');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Memulai database transaction
        try {
            DB::transaction(function () use ($request) {
                // Buat instance baru untuk artikel
                $article = new Artikel();
                $article->title = $request->input('title');
                $article->description = $request->input('description');

                // Simpan gambar jika ada
                if ($request->hasFile('image_path')) {
                    $path = $request->file('image_path')->store('articles', 'public');
                    $article->image_path = $path;
                }

                // Simpan artikel ke database
                $article->save();
            });

            return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangani exception dan kembalikan dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit-artikel', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Memulai database transaction
        try {
            DB::transaction(function () use ($request, $id) {
                $artikel = Artikel::findOrFail($id);
                $artikel->title = $request->title;
                $artikel->description = $request->description;

                if ($request->hasFile('image_path')) {
                    // Hapus gambar lama jika ada
                    if ($artikel->image_path) {
                        Storage::disk('public')->delete($artikel->image_path); // Menghapus gambar lama
                    }
                    // Simpan gambar baru
                    $path = $request->file('image_path')->store('artikel', 'public');
                    $artikel->image_path = $path;
                }

                $artikel->save(); // Simpan perubahan
            });

            return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani exception dan kembalikan dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus.');
    }


    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.detail-artikel', compact('artikel'));
    }
}
