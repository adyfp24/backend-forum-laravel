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
Route::get('v1/me',[UserController::class, 'me'])->middleware('auth:api');

# rest api - CRUD grup
Route::middleware(['auth:api'])->prefix('v1')->group(function () {
    Route::get('group', [GroupController::class, 'getGroup']);
    Route::get('group/{id}', [GroupController::class, 'getGroupById']);
    Route::post('group', [GroupController::class, 'addGroup']);
    Route::put('group/{id}', [GroupController::class, 'updateGroup']);
    Route::delete('group/{id}', [GroupController::class, 'deleteGroup']);
});

# rest api - CRUD message 
Route::middleware(['auth:api'])->prefix('v1')->group(function(){
    Route::get('message/{groupId}', [MessageController::class, 'index']);
    Route::post('message/{groupId}', [MessageController::class, 'store']);
    Route::put('message/{id}', [MessageController::class, 'update']);
    Route::delete('message/{id}', [MessageController::class, 'delete']);
});

# rest api - group member
