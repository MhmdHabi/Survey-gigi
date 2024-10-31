<?php

use App\Http\Controllers\Admin\AdminQuestionsController;
use App\Http\Controllers\Admin\SurveyController as AdminSurveyController;
use App\Http\Controllers\Admin\SurveyResponseController as AdminSurveyResponseController;
use App\Http\Controllers\ArtikelController;
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
    Route::post('/surveys/survey-susu-formula/{id}/submit', [SurveyResponseController::class, 'submit'])->name('surveys.submit');
    Route::get('/survey-results', [SurveyResponseController::class, 'results'])->name('survey.results');
});
// Menampilkan daftar survei


// Menampilkan detail survei




// Menghapus survei

// Jika Anda juga ingin menambahkan rute untuk membuat survei

// Menyimpan survei baru



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/surveys/survey-susu-formula/{id}', [SurveyController::class, 'susu'])->name('susu');
Route::get('/survey-menyikat gigi', [SurveyController::class, 'gigi'])->name('gigi');
Route::get('/survey-pola-asuh', [SurveyController::class, 'asuh'])->name('asuh');


Route::prefix('admin')->group(function () {
    // CRUD Mahasiswa
    Route::prefix('/')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/artikel', [ArtikelController::class, 'artikel'])->name('admin.artikel');
        Route::get('/artikel/add', [ArtikelController::class, 'create'])->name('artikel.add');
        Route::post('/article/add', [ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');

        // Routes Questions
        Route::get('/surveys/{survey}/questions/create', [AdminQuestionsController::class, 'buat'])->name('questions.buat');
        Route::get('/surveys/questions', [AdminQuestionsController::class, 'store'])->name('questions.store');
        Route::post('/surveys/{survey}/questions', [AdminQuestionsController::class, 'store'])->name('questions.store');



        // Routes Survey Admin
        Route::get('/surveys', [AdminSurveyController::class, 'index'])->name('surveys.index');
        Route::get('/surveys/create', [AdminSurveyController::class, 'create'])->name('surveys.create');
        Route::get('/surveys/{id}', [AdminSurveyController::class, 'show'])->name('surveys.show');
        Route::get('/survey/user', [AdminSurveyResponseController::class, 'index'])->name('survey.response.results');
        Route::get('/surveys/{id}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
        Route::put('/surveys/{id}', [SurveyController::class, 'update'])->name('surveys.update');
        Route::post('/surveys', [AdminSurveyController::class, 'store'])->name('surveys.store');
        Route::delete('/surveys/{id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');
    });
});
