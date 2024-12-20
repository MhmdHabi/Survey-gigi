<?php

use App\Http\Controllers\Admin\AdminQuestionsController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\SurveyController as AdminSurveyController;
use App\Http\Controllers\Admin\SurveyResponseController as AdminSurveyResponseController;
use App\Http\Controllers\Admin\SurveyResultController;
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

// Routes Admin
Route::get('/admin/login', [AuthAdminController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthAdminController::class, 'logoutAdmin'])->name('admin.logout');




// Routes Middleware User
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/survey/{id}', [SurveyController::class, 'susu'])->name('susu');
    Route::post('/survey/survey-susu-formula/{id}/submit', [SurveyResponseController::class, 'submit'])->name('surveys.submit');
    Route::get('/hasil-survey', [SurveyResponseController::class, 'results'])->name('survey.results');
    Route::get('/survey/hasil/{surveyResponseId}', [SurveyController::class, 'resultsSurvey'])->name('survey.results.get');
    Route::post('survey/hasil/{surveyResponseId}/image', [SurveyResponseController::class, 'storeImage'])->name('survey.response.image.store');
    Route::get('/survey/results/{surveyResponseId}', [SurveyResponseController::class, 'showHasil'])->name('survey.results.show');
});

// Routes User
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/detail/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/survey-menyikat gigi', [SurveyController::class, 'gigi'])->name('gigi');
Route::get('/survey-pola-asuh', [SurveyController::class, 'asuh'])->name('asuh');




// Routes Middleware Admin
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::prefix('/')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [DashboardController::class, 'user'])->name('admin.users');
        Route::get('/artikel', [ArtikelController::class, 'artikel'])->name('admin.artikel');
        Route::get('/artikel/add', [ArtikelController::class, 'create'])->name('artikel.add');
        Route::post('/article/add', [ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');

        Route::get('survey/export/excel', [SurveyResultController::class, 'export'])->name('survey.export');
        Route::get('survey/export/csv', [SurveyResultController::class, 'exportCsv'])->name('survey.export.csv');


        // Routes Questions
        Route::get('/survey/{survey}/questions/create', [AdminQuestionsController::class, 'buat'])->name('questions.buat');
        Route::get('/survey/questions', [AdminQuestionsController::class, 'store'])->name('questions.store');
        Route::post('/survey/{survey}/questions', [AdminQuestionsController::class, 'store'])->name('questions.store');


        // Routes Survey Admin
        Route::get('/survey', [AdminSurveyController::class, 'index'])->name('surveys.index');
        Route::get('/survey/create', [AdminSurveyController::class, 'create'])->name('surveys.create');
        Route::get('/survey/{id}', [AdminSurveyController::class, 'show'])->name('surveys.show');
        Route::get('/survey/{surveyId}/results/{surveyResponId}', [SurveyResultController::class, 'showSurveyResults'])->name('admin.result.show');
        Route::get('/surveys/user', [AdminSurveyResponseController::class, 'index'])->name('survey.response.result');
        Route::get('/survey/{id}/edit', [AdminSurveyController::class, 'edit'])->name('surveys.edit');
        Route::put('/survey/{id}', [AdminSurveyController::class, 'update'])->name('surveys.update');
        Route::post('/survey', [AdminSurveyController::class, 'store'])->name('surveys.store');
        Route::delete('/survey/{id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');

        // Routes Image Admin
        Route::get('/image', [ImageController::class, 'index'])->name('admin.image.index');
        Route::get('/image/create', [ImageController::class, 'create'])->name('admin.image.create');
        Route::post('/image/create', [ImageController::class, 'store'])->name('admin.image.store');
        Route::delete('/image/delete/{id}', [ImageController::class, 'destroy'])->name('admin.image.destroy');
    });
});
