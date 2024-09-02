<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

Route::post('/register',[RegisterController::class,'store']);
Route::post('/login',[LoginController::class,'check']);
Route::post('/house', [HouseController::class, 'store']);
Route::get('/postedhouse', [HouseController::class, 'index']);
Route::get('/house/{id}', [HouseController::class, 'show']);
Route::post('/agent', [AgentController::class, 'store']);
Route::get('/postedagent', [AgentController::class, 'index']);
Route::get('/agent/{id}', [AgentController::class, 'show']);
Route::middleware('auth:api')->get('/user', [RegisterController::class, 'getUser']);
Route::put('/user/update', [RegisterController::class, 'update']);






