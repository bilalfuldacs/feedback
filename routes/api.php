<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
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


Route::controller(UserController::Class)->group(function(){
    Route::post('registeruser','register');
    route::post('login','login');
});


Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('addfeedback',[FeedbackController::class,'store']);
});

