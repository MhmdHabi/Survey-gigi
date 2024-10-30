<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/survey-susu-formula', [SurveyController::class, 'susu'])->name('susu');
Route::get('/survey-menyikat gigi', [SurveyController::class, 'gigi'])->name('gigi');
Route::get('/survey-pola-asuh', [SurveyController::class, 'asuh'])->name('asuh');
