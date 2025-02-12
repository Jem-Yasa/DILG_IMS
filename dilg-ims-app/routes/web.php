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
        Route::view('admin-property_issued', 'admin.admin-property_issued')->name('admin-property_issued');
        Route::view('admin-property_card', 'admin.admin-property_card')->name('admin-property_card');
        Route::view('admin-property_ledger_card', 'admin.admin-property_ledger_card')->name('admin-property_ledger_card');
        Route::view('admin-ics', 'admin.admin-ics')->name('admin-ics');
        Route::view('admin-expendable_issued', 'admin.admin-expendable_issued')->name('admin-expendable_issued');
        Route::view('admin-par', 'admin.admin-par')->name('admin-par');
        Route::view('admin-history', 'admin.admin-history')->name('admin-history');
    });

require __DIR__.'/auth.php';
