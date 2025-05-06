<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/services', 'App\Http\Controllers\Api\ServiceController');
    Route::apiResource('/products', 'App\Http\Controllers\Api\ProductController');
    Route::apiResource('/pages', 'App\Http\Controllers\Api\PagesController');

    // Image upload endpoint
    Route::post('/upload/image', 'App\Http\Controllers\Api\ImageUploadController@upload');
});
