<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\LensController;
use App\Http\Controllers\Api\TryOnController;
use App\Http\Controllers\Api\QrCodeController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\ShopkeeperController;

// ========== AUTH ROUTES ==========
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);

// ========== USER ROUTES ==========
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

// ========== OTP ROUTES ==========
Route::post('/verify-otp', [UserController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp', [UserController::class, 'resendOtp'])->name('resend.otp');

// ========== PUBLIC ROUTES ==========
Route::get('/lenses', [LensController::class, 'apiIndex']);
Route::apiResource('tryons', TryOnController::class);
Route::apiResource('qrcodes', QrCodeController::class);

// ========== ADMIN PROTECTED ROUTES ==========
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/shops', [AdminController::class, 'getShops']);
    Route::post('/admin/approve/{id}', [AdminController::class, 'approveShopkeeper']);

    Route::prefix('admin')->group(function () {
        Route::get('/lenses', [LensController::class, 'apiIndex']);
        Route::post('/lenses', [LensController::class, 'store']);
        Route::post('/lenses/{id}', [LensController::class, 'update']);
        Route::delete('/lenses/{id}', [LensController::class, 'destroy']);
    });
});

// ========== SHOPKEEPER PROTECTED ROUTES ==========
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/shopkeeper/dashboard', [ShopkeeperController::class, 'getDashboard']);
    Route::post('/shopkeeper/update-shop', [ShopkeeperController::class, 'updateShop']);
});