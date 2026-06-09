<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

Route::prefix('v1')->group(function () {

    Route::post('register',
        'App\Http\Controllers\AuthController@register');

    Route::post('login',
        'App\Http\Controllers\AuthController@login');

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('categories',
            'App\Http\Controllers\CategoryController');

        Route::apiResource('items',
            'App\Http\Controllers\ItemController');
    });
});