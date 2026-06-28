<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

Route::prefix('v1')->group(function () {

    Route::post('register',
        'App\Http\Controllers\AuthController@register');

    Route::post('login',
        'App\Http\Controllers\AuthController@login');

    Route::middleware([
        'auth:sanctum',
        'throttle:60,1'
    ])->group(function () {

        Route::apiResource('categories',
            'App\Http\Controllers\CategoryController');

        Route::apiResource('items',
            'App\Http\Controllers\ItemController');
    });
});