<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EstudianteController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ReportesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
  
    Route::middleware(['role_json:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
    });

    Route::middleware(['role_json:adminPremium'])->group(function () {
        Route::get('/adminPremium', [ReportesController::class, 'reporte']);
    });
    Route::middleware(['role_json:estudiante'])->group(function () {
        Route::get('/estudiante', [EstudianteController::class, 'index']);
    });
});