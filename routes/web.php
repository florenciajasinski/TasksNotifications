<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Lightit\Shared\App\Http\Controllers\RegisterController;
use Lightit\Shared\App\Http\Controllers\JobController;
use Lightit\Shared\App\Http\Controllers\SessionController;
use Lightit\Shared\App\Policies\JobPolicy;
use Lightit\Shared\App\Policies;


Route::get('/', static fn() => view('welcome'));


Route::get('/jobs', [JobController::class, 'index']);


Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');

Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');


Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit,job']);



Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');


Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');


Route::get('/jobs/{job}', [JobController::class, 'show']);


Route::view('/contact', 'contact');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
