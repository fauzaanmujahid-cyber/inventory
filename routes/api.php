<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/check-token', function (Request $request) {
    return response()->json([
        'auth_check' => auth()->check(),
        'user' => $request->user(),
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('items', ItemController::class);
});