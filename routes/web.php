<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', [MahasiswaController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/about', function () {
    return view('page.about');
});