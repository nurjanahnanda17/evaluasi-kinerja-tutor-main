<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\KriteriaKontroller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\WargaEvaluasiController;


Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');
});


Route::middleware(['auth', 'checkRole:warga'])->group(function () {
    Route::get('/evaluasi', [WargaEvaluasiController::class, 'index'])->name('warga.index');
    Route::post('/evaluasi', [WargaEvaluasiController::class, 'store'])->name('warga.store');
    Route::view('/evaluasi/berhasil', 'pages.student.selesai')->name('warga.selesai');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/tutor/evaluasi', [EvaluasiController::class, 'index'])->name('tutor.evaluasi');
    Route::get('/tutor/evaluasi/{id}', [EvaluasiController::class, 'show'])->name('admin.evaluasi.show');

    Route::get('/tutors', [TutorController::class, 'index'])->name('tutor.index');
    Route::get('/tutors/{id}', [TutorController::class, 'show'])->name('tutors.show');
    Route::put('/tutors/{id}', [TutorController::class, 'update'])->name('tutors.update');
    Route::post('/tutors', [TutorController::class, 'store'])->name('tutor.store');
    Route::delete('/tutors/{id}', [TutorController::class, 'destroy'])->name('tutor.destroy');

    Route::get('/kriteria', [KriteriaKontroller::class, 'index'])->name('kriteria.index');
    Route::get('/kriteria/{id}', [KriteriaKontroller::class, 'show'])->name('kriteria.show');
    Route::put('/kriteria/{id}/update', [KriteriaKontroller::class, 'update'])->name('kriteria.update');
    Route::post('/kriteria', [KriteriaKontroller::class, 'store'])->name('kriteria.store');
    Route::delete('/kriteria/{id}', [KriteriaKontroller::class, 'destroy'])->name('kriteria.destroy');
});

Route::middleware(['auth', 'checkRole:kepala'])->group(function () {
    Route::get('/kepala/evaluasi', [KepalaController::class, 'index'])->name('kepala.index');
    Route::get('/kepala/evaluasi/{tutor}', [KepalaController::class, 'show'])->name('kepala.show');
});
Route::get('/export/evaluasi', [EvaluasiController::class, 'export'])->name('admin.export.evaluasi')->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
