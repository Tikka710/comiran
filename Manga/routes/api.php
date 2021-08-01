<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\Mangafeedcontroller;
use App\Http\Controllers\Api\ThemaController;
use App\Http\Controllers\Api\ArticleController;

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
Route::apiResource('feed', Mangafeedcontroller::class);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
