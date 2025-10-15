<?php

use App\Http\Controllers\AirlineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/airlines', [AirlineController::class, 'index']);
Route::get('/airlines/{id}', [AirlineController::class, 'show']);
Route::post('/airlines', [AirlineController::class, 'store']);
Route::put('/airlines/{id}', [AirlineController::class, 'update']);
Route::delete('/airlines/{id}', [AirlineController::class, 'destroy']);
