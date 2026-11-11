<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', [MahasiswaController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('login');
    Route::post('/admin/login', [AdminAuthController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])->name('logout');
    Route::get('/admin', function () {
        return view('page.admin-dashboard')->with('hideLayoutShell', true);
    })->name('admin.dashboard');
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/pdf', [ProjectController::class, 'pdf'])->name('project.pdf');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
});

Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/about', function () {
    return view('page.about');
});
