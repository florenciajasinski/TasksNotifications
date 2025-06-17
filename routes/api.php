<?php

declare(strict_types=1);


use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employee\App\Controllers\ListEmployeesController;
use Lightit\Backoffice\Employee\App\Controllers\StoreEmployeeController;


Route::prefix('employees')
    ->group( function (){
        Route::post('/', StoreEmployeeController::class)->name('employees');
        Route::get('/', ListEmployeesController::class);
    });


