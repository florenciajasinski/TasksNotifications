<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use Lightit\Shared\App\Exceptions\Http\InvalidActionException;
use Lightit\Shared\App\Job;

Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));

Route::get('/', static fn() => view('welcome'));


Route::get('/jobs', function (){
    return view('jobs.index', ['jobs' => Job::with('employer')->paginate(3)]);
});



Route::get('/jobs/create', static fn() => view('jobs.create'));

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find((int)$id);
    return view('jobs.show', ['job' => $job]);

});


Route::get('/contact', static fn() => view('contact'));


Route::get('/login', static fn() => view('welcome'))->name('login');




