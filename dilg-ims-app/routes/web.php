<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.admin-dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::prefix('admin')->group(function () {
        Route::view('admin-dashboard', 'admin.admin-dashboard')->name('admin-dashboard');
    });

require __DIR__.'/auth.php';
