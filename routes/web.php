<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HangoutController;

Route::get('/', [HangoutController::class, 'index']);
Route::post('/hangout', [HangoutController::class, 'store']);
Route::delete('/hangout/{id}', [HangoutController::class, 'destroy']);
Route::put('/hangout/{id}', [HangoutController::class, 'update']);