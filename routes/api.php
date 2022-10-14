<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('category', CategoryController::class);
Route::apiResource('tag', TagController::class);
Route::apiResource('ads', AdsController::class);
Route::apiResource('advertiser', AdvertiserController::class);

Route::get('getAdByCat/{name}', [AdsController::class, 'filterByCategory']);
Route::get('getAdByTag/{name}', [AdsController::class, 'filterByTag']);
