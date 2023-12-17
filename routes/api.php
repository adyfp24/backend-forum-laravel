<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/coba', [App\Http\Controllers\API\UserController::class, 'getAllUser']);
Route::get('v1/login',[AuthController::class, 'Login']);
Route::get('v1/logout',[AuthController::class, 'Logout']);
Route::get('v1/register',[AuthController::class, 'Register']);
Route::get('v1/forget',[AuthController::class, 'Forget']);