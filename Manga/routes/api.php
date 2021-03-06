<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\Mangafeedcontroller;
use App\Http\Controllers\Api\ThemaController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\LikeController;

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
// Route::apiResource('thame', ThemaController::class);
Route::apiResource('article', ArticleController::class);
// Route::post('article', 'Api\ArticleController@store');
Route::apiResource('feed', Mangafeedcontroller::class);
Route::apiResource('like', Likecontroller::class);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
