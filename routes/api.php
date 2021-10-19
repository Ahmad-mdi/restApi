<?php

use App\Http\Controllers\Api\V1\PostController as V1PostController;
use App\Http\Controllers\Api\V2\PostController as V2PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\sanctum\AuthController as SanctumAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts',[V1PostController::class,'index'])->middleware('auth:sanctum');;
Route::post('register',[SanctumAuthController::class,'register']);
Route::post('login',[SanctumAuthController::class,'login']);
Route::post('logout',[SanctumAuthController::class,'logout'])->middleware('auth:sanctum');

/*Route::prefix('v1')->group(function (){
    Route::get('posts',[V1PostController::class,'index']);
    Route::get('posts/{post}',[V1PostController::class,'show']);
    Route::post('posts',[V1PostController::class,'store']);
    Route::put('posts/{post}',[V1PostController::class,'update']);
    Route::delete('posts/{post}',[V1PostController::class,'destroy']);
    Route::apiResource('users',UserController::class);
});

Route::prefix('v2')->group(function (){
    Route::get('posts',[V2PostController::class,'index'])->middleware('auth:api');
    Route::get('posts/{post}',[V2PostController::class,'show']);
    Route::post('posts',[V2PostController::class,'store']);
    Route::put('posts/{post}',[V2PostController::class,'update']);
    Route::delete('posts/{post}',[V2PostController::class,'destroy']);
    Route::apiResource('users',UserController::class);
});*/

/*Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:api');*/

