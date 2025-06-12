<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Lightit\Shared\App\Http\Controllers\RegisterController;
use Lightit\Shared\App\Http\Controllers\JobController;



Route::get('/', static fn() => view('welcome'));

Route::get('/jobs', [JobController::class, 'index']);

Route::post('/jobs', [JobController::class, 'create']);

Route::get('/jobs/create', static fn() => view('jobs.create'));

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

Route::patch('/jobs/{job}', [JobController::class, 'update']);

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::view('/contact', 'contact');

//Route::get('/register', [RegisterController::class, 'create']);

Route::get('/login', static fn() => view('welcome'))->name('login');




