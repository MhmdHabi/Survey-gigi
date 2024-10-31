<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResponseController;
use App\Models\SurveyResponse;
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



// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/survey/survey-susu-formula/{id}/submit', [SurveyResponseController::class, 'submit'])->name('surveys.submit');
    Route::get('/hasil-survey', [SurveyResponseController::class, 'results'])->name('survey.results');
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
Route::get('/surveys/survey-susu-formula/{id}', [SurveyController::class, 'susu'])->name('susu');
Route::get('/survey-menyikat gigi', [SurveyController::class, 'gigi'])->name('gigi');
Route::get('/survey-pola-asuh', [SurveyController::class, 'asuh'])->name('asuh');


Route::prefix('admin')->group(function () {
    // CRUD Mahasiswa
    Route::prefix('/')->group(function () {
        Route::get('/login', [AuthAdminController::class, 'index'])->name('admin.login');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/artikel', [ArtikelController::class, 'artikel'])->name('admin.artikel');
        Route::get('/artikel/add', [ArtikelController::class, 'create'])->name('artikel.add');
        Route::post('/article/add', [ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');
    });
});
