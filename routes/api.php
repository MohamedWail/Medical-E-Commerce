<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiRegisterController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiCartController;





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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [ApiRegisterController::class, 'register']);
Route::post('login', [ApiRegisterController::class, 'login']);
Route::get('category', [ApiCategoryController::class, 'index']);
Route::get('product', [ApiProductController::class, 'index']);
Route::post('add-to-cart', [ApiCartController::class, 'addToCart']);
Route::post('get-cart-content', [ApiCartController::class, 'getCartContent']);
Route::post('remove-from-cart', [ApiCartController::class, 'removeFromCart']);


