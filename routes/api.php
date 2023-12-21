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

Route::post('user/login', function (Request $request) {
    $user = User::Where('email', $request->email)->first();
    if ($user && Hash::check($request->password, $user->password)) {
        $objToken = $user->createToken('User', ['user'])->plainTextToken;
        $strToken = $objToken->accessToken;
        $user->update();
        $response = \App\Helpers\Helper::createSuccessResponse([
            "exist" => $user->email ? true : false,
            "token_type" => "Bearer",
            "token" => $strToken,
            'user' => $user
        ], "Welcome back $user->name");
        return response()->json($response, 200);
    } else {
        $response = \App\Helpers\Helper::createErrorResponse([], 'Incorrect Email or Password');
        return response()->json($response, 401);
    }
});
Route::resource('catalog', \App\Modules\Catalog\Controllers\CatalogDashboardController::class);
Route::resource('workarea', \App\Modules\Workarea\Controllers\WorkareaDashboardController::class);
Route::resource('technicalCharacteristic', \App\Modules\TechnicalCharacteristic\Controllers\TechnicalCharacteristicDashboardController::class);
Route::resource('product', \App\Modules\Product\Controllers\ProductDashboardController::class);
Route::resource('user', \App\Modules\Auth\User\Controllers\UserDashboardController::class);
Route::resource('order', \App\Modules\Order\Controllers\OrderDashboardController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('catalog', [\App\Modules\Catalog\Controllers\CatalogDashboardController::class, 'index']);

    //Route::resource('catalog', \App\Modules\Catalog\Controllers\CatalogDashboardController::class);
});

