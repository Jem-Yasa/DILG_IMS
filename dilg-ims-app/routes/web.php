<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::view('/', 'admin.admin-dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::prefix('admin')->group(function () {
        Route::view('admin-dashboard', 'admin.admin-dashboard')->name('admin-dashboard');
        // Route::view('admin-issued_table', 'admin.admin-issued_table')->name('admin-issued_table');
        Route::get('admin-issued_table', [PropertyController::class, 'index'])->name('admin-issued_table');

        Route::view('admin-registry', 'admin.admin-registry')->name('admin-registry');
        Route::view('admin-semi_card', 'admin.admin-semi_card')->name('admin-semi_card');
        Route::view('admin-property_ledger_card', 'admin.admin-property_ledger_card')->name('admin-property_ledger_card');
        Route::view('admin-ics', 'admin.admin-ics')->name('admin-ics');
        Route::view('admin-expendable_issued', 'admin.admin-expendable_issued')->name('admin-expendable_issued');
        Route::view('admin-par', 'admin.admin-par')->name('admin-par');
        Route::view('admin-history', 'admin.admin-history')->name('admin-history');
        Route::view('admin-create', 'admin.admin-create')->name('admin-create');

        // Property
        Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
        Route::post('/property/store', [PropertyController::class, 'store'])->name('property.store');
        Route::post('/property/edit', [PropertyController::class, 'edit'])->name('property.edit');
        Route::get('/property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
        Route::post('/property/destroy', [PropertyController::class, 'destroy'])->name('property.destroy');
    });

require __DIR__.'/auth.php';
