<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/students/{id}', [MainController::class, 'show'])->name('students.show');
Route::post('/students', [MainController::class, 'store'])->name('students.store');
Route::put('/students/{id}', [MainController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [MainController::class, 'destroy'])->name('students.destroy');

