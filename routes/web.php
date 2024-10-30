<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/survey-susu-formula', [SurveyController::class, 'susu'])->name('susu');
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
    });
});
