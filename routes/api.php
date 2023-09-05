<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/coba', function () {
    return response()->json([
        'message' => 'backend'
    ],status:200
    ) ;

});
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