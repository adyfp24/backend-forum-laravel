<?php

use App\Http\Middleware\Authenticate;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/coba', [App\Http\Controllers\API\UserController::class, 'getAllUser']);
Route::post('v1/login',[AuthController::class, 'Login']);
Route::post('v1/logout',[AuthController::class, 'Logout'])->middleware('auth:api');
Route::post('v1/register',[AuthController::class, 'Register']);
Route::post('v1/forget',[AuthController::class, 'Forget']);
Route::get('v1/me',[UserController::class, 'Me'])->middleware('auth:api');