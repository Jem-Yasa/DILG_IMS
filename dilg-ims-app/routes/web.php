<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::view('/', 'admin.admin-dashboard');

// Dashboard & Profile Routes
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::view('admin-dashboard', 'admin.admin-dashboard')->name('admin-dashboard');

    // Issued Table (Now properly handled by PropertyController)
    Route::get('admin-issued_table', [PropertyController::class, 'index'])->name('admin-issued_table');

    // Registry Table (Now properly handled by PropertyController)
    Route::get('admin-registry', [PropertyController::class, 'registryTable'])->name('admin-registry');

    // Semi-Expendable Property Card
    Route::get('admin-semi_card', [PropertyController::class, 'semiExpendablePropertyCardTable'])->name('admin-semi_card');
   
   
   
    // Other Admin Views
    Route::view('admin-property_ledger_card', 'admin.admin-property_ledger_card')->name('admin-property_ledger_card');
    Route::view('admin-ics', 'admin.admin-ics')->name('admin-ics');
    Route::view('admin-expendable_issued', 'admin.admin-expendable_issued')->name('admin-expendable_issued');
    Route::view('admin-par', 'admin.admin-par')->name('admin-par');
    Route::view('admin-history', 'admin.admin-history')->name('admin-history');
    Route::view('admin-create', 'admin.admin-create')->name('admin-create');

    // Property Routes
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::post('/property/store', [PropertyController::class, 'store'])->name('property.store');
    Route::get('/property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit'); 
    Route::put('/property/update/{property}', [PropertyController::class, 'update'])->name('property.update');
    Route::delete('/property/destroy/{property}', [PropertyController::class, 'destroy'])->name('property.destroy');

    
});


require __DIR__.'/auth.php';
