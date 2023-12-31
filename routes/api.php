<?php

use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RestaurantController as ApiRestaurantController;
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

Route::get('restaurants', [ApiRestaurantController::class, 'index']);

Route::get('restaurants/{slug}', [ApiRestaurantController::class, 'show']);

Route::post('/braintree/token', [PaymentController::class, 'createPaymentToken']);
Route::post('/braintree/payment', [PaymentController::class, 'processPayment']);
