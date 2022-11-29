<?php

use App\Http\Controllers\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/login', [App\Http\Controllers\API\AuthController::class, 'login'] );
Route::post('/auth/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/auth/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
Route::apiResource('food', \App\Http\Controllers\API\FoodController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::post('/auth/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::apiResource('categories', \App\Http\Controllers\API\CategoryController::class);

});
