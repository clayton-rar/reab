<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/{id}', [UserController::class, 'listById']);
Route::get('/', [UserController::class, 'list']);
Route::post('/', [UserController::class, 'add']);
Route::patch('/{id}', [UserController::class, 'edit']);
Route::delete('/{id}', [UserController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
