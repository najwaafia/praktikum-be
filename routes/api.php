<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentlController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/animal', [AnimalController::class, 'index']);

Route::post('/animal', [AnimalController::class, 'store']);

Route::put('/animal/{id}', [AnimalController::class, 'update']);

Route::delete('/animal/{id}', [AnimalController::class, 'destroy']);


Route::get('/student', [StudentlController::class, 'index']);

Route::post('/student', [StudentlController::class, 'store']);

Route::put('/student/{id}', [StudentlController::class, 'update']);

Route::delete('/student/{id}', [StudentlController::class, 'destroy']);

Route::get('/student/{id}', [StudentlController::class, 'show']);