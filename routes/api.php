<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [AuthController::class, 'verify']);

Route::group(['prefix' => 'publishers'], function () {
    Route::get('/', [PublisherController::class, 'getAll']);
    Route::get('/{id}', [PublisherController::class, 'getById']);
    Route::get('/{id}/books', [PublisherController::class, 'getBooksByIdPublisher']);
    Route::post('/', [PublisherController::class, 'create']);
    Route::put('/', [PublisherController::class, 'update']);
    Route::delete('/', [PublisherController::class, 'delete']);
});

Route::group(['prefix' => 'books'], function () {
    Route::get('/', [BookController::class, 'getAll']);
    Route::get('/{id}', [BookController::class, 'getById']);
    Route::post('/', [BookController::class, 'create']);
    Route::put('/', [BookController::class, 'update']);
    Route::delete('/', [BookController::class, 'delete']);
});
