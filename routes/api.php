<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [AuthController::class, 'verify']);

Route::group(['prefix' => 'publishers','middleware'=>'pbe.auth'], function () {
    Route::get('/', [PublisherController::class, 'getAll']);
    Route::get('/{id}', [PublisherController::class, 'getById']);
    Route::get('/{id}/books', [PublisherController::class, 'getBooksByIdPublisher']);

    Route::post('/', [PublisherController::class, 'create'])->middleware('pbe.admin');
    Route::put('/', [PublisherController::class, 'update'])->middleware('pbe.admin');

    Route::delete('/', [PublisherController::class, 'delete'])->middleware('pbe.superadmin');
});

Route::group(['prefix' => 'books','middleware'=>'pbe.auth'], function () {
    Route::get('/', [BookController::class, 'getAll']);
    Route::get('/{id}', [BookController::class, 'getById']);

    Route::group(['middleware' => 'pbe.admin'], function ()
    {
        Route::post('/', [BookController::class, 'create']);
        Route::put('/', [BookController::class, 'update']);
    });
    Route::group(['middleware' => 'pbe.superadmin'], function ()
    {
        Route::delete('/', [BookController::class, 'delete']);
    });

});