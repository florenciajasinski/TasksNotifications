<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employee\App\Controllers\ListEmployeesController;
use Lightit\Backoffice\Employee\App\Controllers\StoreEmployeeController;
use Lightit\Shared\App\Exceptions\Http\InvalidActionException;

Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));

Route::get('/', static fn() => view('app'));

Route::post('/employees', StoreEmployeeController::class)->name('employees');

Route::get('/employees', ListEmployeesController::class)->name('employees.list');
