<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ParentController;

// Rute autentikasi disediakan oleh Laravel Breeze secara default

Route::middleware(['auth'])->group(function () {
    // Rute dashboard untuk Admin dan Guru
    Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboard');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

    // Rute untuk dashboard Orang Tua
    Route::get('/orangtua/dashboard', [ParentController::class, 'viewChildAttendance'])->name('orangtua.dashboard');
});
