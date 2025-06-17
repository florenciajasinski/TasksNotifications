<?php

declare(strict_types=1);


use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employee\App\Controllers\ListEmployeesController;
use Lightit\Backoffice\Employee\App\Controllers\StoreEmployeeController;
use Lightit\Backoffice\Task\App\Controllers\GetTaskController;
use Lightit\Backoffice\Task\App\Controllers\ListTasksController;
use Lightit\Backoffice\Task\App\Controllers\UpdateTaskController;


Route::prefix('employees')
    ->group( function (): void{
        Route::post('/', StoreEmployeeController::class)->name('employees');
        Route::get('/', ListEmployeesController::class);
    });
Route::prefix('tasks')
    ->group( function (): void{
        Route::post('/', UpdateTaskController::class)->name('tasks');
        Route::get('/', ListTasksController::class);
        Route::get('/{task}', GetTaskController::class);
    });


