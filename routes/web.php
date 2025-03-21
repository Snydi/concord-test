<?php

use App\Http\Controllers\ReadingController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/', [ReadingController::class, 'store']);

    Route::get('/sensors', [ReadingController::class, 'index']);
});
Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '.*');
