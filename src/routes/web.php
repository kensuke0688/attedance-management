<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AttendanceController;

// 認証関連のルート
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');

// 会員登録関連のルート
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

// 認証が必要なルート
Route::middleware(['auth'])->group(function () {
    Route::get('/stamp', [StampController::class, 'stamp'])->name('stamp');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::post('/stamp', [StampController::class, 'store'])->name('stamp.store');
});
