<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResponseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

// Menampilkan daftar survei
Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');
Route::get('/surveys/buat', [SurveyController::class, 'tampil'])->name('surveys.tampil');


// Menampilkan detail survei
Route::get('/surveys/{id}', [SurveyController::class, 'show'])->name('surveys.show');

// Menampilkan form untuk mengedit survei
Route::get('/surveys/{id}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');

// Mengupdate survei
Route::put('/surveys/{id}', [SurveyController::class, 'update'])->name('surveys.update');


// Menghapus survei
Route::delete('/surveys/{id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');

// Jika Anda juga ingin menambahkan rute untuk membuat survei

// Menyimpan survei baru
Route::post('/surveys', [SurveyController::class, 'store'])->name('surveys.store');


Route::get('/surveys/{survey}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/surveys/{survey}/questions', [QuestionController::class, 'store'])->name('questions.store');
