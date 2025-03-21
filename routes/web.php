<?php

use App\Http\Controllers\ReadingController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::prefix('sensors')->group(function () {
        Route::get('/', [ReadingController::class, 'index']);
        Route::post('/', [ReadingController::class, 'store']);
    });
});

Route::get('/', function () {
    return view('layouts.app');
})->where('any', '.*');
