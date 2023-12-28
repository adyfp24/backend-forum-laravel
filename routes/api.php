<?php

use App\Http\Controllers\api\v1\ShortlinkController;
use App\Http\Controllers\api\v1\GroupController;
use App\Http\Controllers\api\v1\MessageController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\UserController;

# rest api - authentication routes
Route::prefix('v1')->group(function(){
    Route::post('login',[AuthController::class, 'login']);
    Route::post('register',[AuthController::class, 'register']);
    Route::post('logout',[AuthController::class, 'logout'])->middleware('auth:api');
    Route::put('forget',[AuthController::class, 'forget']);
});

# rest api - endpoint me
Route::get('v1/me',[UserController::class, 'Me'])->middleware('auth:api');

# rest api - CRUD grup
Route::middleware(['auth:api'])->prefix('v1')->group(function () {
    Route::get('group', [GroupController::class, 'index']);
    Route::post('group', [GroupController::class, 'store']);
    Route::put('group', [GroupController::class, 'update']);
    Route::delete('group', [GroupController::class, 'delete']);
});

#rest api - CRUD message 
Route::middleware(['auth:api'])->prefix('v1')->group(function(){
    Route::get('message', [MessageController::class, 'index']);
    Route::post('message', [MessageController::class, 'store']);
    Route::put('message', [MessageController::class, 'update']);
    Route::delete('message', [MessageController::class, 'delete']);
});
