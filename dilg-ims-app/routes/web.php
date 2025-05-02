<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController; // Make sure to import PropertyController

Route::get('/test-issued-quantity', function () {
    $issuedQuantityCount = \App\Models\Property::where('status', 'Issued')->sum('quantity');
    return response()->json(['issued_quantity' => $issuedQuantityCount]);
});

// Default Route
Route::view('/', 'auth.login');

// Protected Routes (Requires Authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->middleware('verified')->name('dashboard');
    Route::view('profile', 'profile.profile')->name('profile');
    Route::view('edit', 'profile.edit')->name('profile.edit');
    Route::view('update', 'profile.update')->name('profile.update');
    Route::view('destroy', 'profile.destroy')->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/status-quantities', [DashboardController::class, 'statusQuantities'])->name('status-quantities');

    // Property Management
    Route::controller(PropertyController::class)->group(function () {
        Route::get('admin-issued_table', 'index')->name('admin-issued_table');
        Route::get('admin-registry', 'registryTable')->name('admin-registry');
        Route::get('admin-property_acknowledgment_receipt', 'acknowledgmentReceipt')->name('admin-property_acknowledgment_receipt');
        Route::get('admin-par', 'propertyAcknowledgmentReceipt')->name('admin-par');
        Route::get('admin-semi_card', 'semiExpendablePropertyCardTable')->name('admin-semi_card');
        Route::get('admin-ics', 'inventoryCustodianSlip')->name('admin-ics');
        Route::get('admin-property_ledger_card', 'semiExpendablePropertyLedgerCardTable')->name('admin-property_ledger_card');
        Route::get('admin-expendable_issued', 'semiExpendableIssued')->name('admin-expendable_issued');

        // CRUD Routes
        Route::get('/properties', 'index')->name('properties.index');
        Route::post('/property/store', 'store')->name('property.store');
        Route::get('/property/{id}/edit', 'edit')->name('property.edit');
        Route::put('/property/{id}', 'update')->name('property.update');
        Route::delete('/property/destroy/{id}', 'destroy')->name('property.destroy');
        Route::get('/property/history', 'history')->name('property.history');
    });

    // Additional Views
    Route::get('admin-history', [PropertyController::class, 'history'])->name('admin-history');
    Route::view('admin-create', 'admin.admin-create')->name('admin-create');
});

// Auth Routes
require __DIR__.'/auth.php';
