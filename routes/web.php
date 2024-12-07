<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConsultantController::class, 'welcome'])->name('welcome');

Route::post('/store', [ConsultantController::class,'store'])->name('store');

Route::middleware(['isLogin'])->group(function () {
    Route::get('/insert', [ConsultantController::class, 'addConsultant'])->name('addConsultant');
    Route::get('/edit/{id}', [ConsultantController::class, 'editConsultant'])->name('editConsultant');
    Route::delete('/delete/{id}', [ConsultantController::class,'deleteConsultant'])->name('deleteConsultant');
});

Route::put('/update/{id}', [ConsultantController::class, 'updateConsultant'] )->name('updateConsultant');

Route::get('/register', [AuthController::class,'ShowRegisterForm'])->name('register');

Route::post('/register', [AuthController::class,'Register'])->name('registerStore');

Route::get('/login',[AuthController::class,'ShowLoginForm'])->name('login');

Route::post('/login',[AuthController::class,'Login'])->name('loginStore');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
