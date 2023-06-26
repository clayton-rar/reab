<?php

use App\Http\Controllers\ClinicController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/{id}', [ClinicController::class, 'listById']);
Route::middleware('auth:sanctum')->get('/', [ClinicController::class, 'list']);
Route::middleware('auth:sanctum')->post('/', [ClinicController::class, 'add']);
Route::middleware('auth:sanctum')->patch('/{id}', [ClinicController::class, 'edit']);
Route::middleware('auth:sanctum')->delete('/{id}', [ClinicController::class, 'destroy']);