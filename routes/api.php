<?php

use App\Http\Controllers\RolesController;
use App\Http\Controllers\SchoolsController;
use Illuminate\Support\Facades\Route;

Route::get('/schools', [SchoolsController::class, 'index']);
Route::get('/schools/{id}', [SchoolsController::class, 'show']);
Route::post('/schools', [SchoolsController::class, 'create']);

Route::post('/roles', [RolesController::class, 'create']);