<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SchoolsController;
use Illuminate\Support\Facades\Route;

Route::get('/schools', [SchoolsController::class, 'index']);
Route::get('/schools/{id}', [SchoolsController::class, 'show']);
Route::post('/schools', [SchoolsController::class, 'create']);
Route::put('/schools/{id}', [SchoolsController::class, 'update']);

Route::post('/roles', [RolesController::class, 'create']);
Route::get('/roles', [RolesController::class, 'index']);
Route::put('/roles/{id}', [RolesController::class, 'update']);
Route::delete('/roles/{id}', [RolesController::class, 'delete']);
Route::get('/roles/{id}', [RolesController::class, 'show']);

Route::get('/employees', [EmployeesController::class, 'index']);
Route::post('/employees', [EmployeesController::class, 'create']);
Route::put('/employees/{id}', [EmployeesController::class, 'update']);
Route::get('/employees/{id}', [EmployeesController::class, 'show']);