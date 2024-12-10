<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ConsultantApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthApiController::class,'Register']);
Route::post('/login', [AuthApiController::class,'Login']);

Route::get('/login',function(){
    return response()->json([
        'success'=>false,
        'message'=> 'You are not logged in please login first'
    ]);
})->name('login');

Route::middleware('auth:api')->post('/logout', [AuthApiController::class, 'Logout']);


Route::middleware('auth:api')->group(function () {
    Route::get('', [ConsultantApiController::class,'index']);
    Route::post('/store', [ConsultantApiController::class,'save']);
    Route::put('/update/{id}', [ConsultantApiController::class,'update']);
    Route::delete('/delete/{id}', [ConsultantApiController::class,'delete']);
});

