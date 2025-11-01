<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);
Route::apiResource('users', UserController::class);

Route::post('verify-otp', [UserController::class, 'verifyOtp'])->name('verify.otp');
Route::post('resend-otp', [UserController::class, 'resendOtp'])->name('resend.otp');




