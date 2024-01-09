<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ProductController;
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

Route::post('/login', [ApiLoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tokens', [ApiLoginController::class, 'showTokens']);
    Route::post('/logout', [ApiLoginController::class, 'logout']);
    Route::post('/logout/all', [ApiLoginController::class, 'logoutAll']);
    Route::post('/logout/{tokenId}', [ApiLoginController::class, 'logoutById']);
    Route::get('/user', function(Request $request){
        return $request->user();
    });
});


// Route::apiResource('/products', ApiProductController::class);

Route::apiResource('/products', ProductController::class);


