<?php

use App\Modules\Auth\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('catalog', \App\Modules\Catalog\Controllers\CatalogDashboardController::class);
    Route::resource('workarea', \App\Modules\Workarea\Controllers\WorkareaDashboardController::class);
    Route::resource('technicalCharacteristic', \App\Modules\TechnicalCharacteristic\Controllers\TechnicalCharacteristicDashboardController::class);
    Route::resource('product', \App\Modules\Product\Controllers\ProductDashboardController::class);
    Route::resource('user', \App\Modules\Auth\User\Controllers\UserDashboardController::class);
    Route::resource('order', \App\Modules\Order\Controllers\OrderDashboardController::class);
    Route::resource('catalog', \App\Modules\Catalog\Controllers\CatalogDashboardController::class);
});

