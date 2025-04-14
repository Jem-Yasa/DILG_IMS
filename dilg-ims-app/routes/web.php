<?php  

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::view('/', 'admin.admin-dashboard');

// Protected Routes (Requires Authentication)
Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->middleware('verified')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::view('admin-dashboard', 'admin.admin-dashboard')->name('admin-dashboard');

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
        Route::get('/property/edit/{id}', 'edit')->name('property.edit'); 
        Route::put('/property/update/{id}', 'update')->name('property.update'); 
        Route::delete('/property/destroy/{id}', 'destroy')->name('property.destroy'); 
        Route::get('/property/history', 'history')->name('property.history');
        
    });

    // Additional Views
    Route::get('admin-history', [PropertyController::class, 'history'])->name('admin-history');
    Route::view('admin-create', 'admin.admin-create')->name('admin-create');
});

require __DIR__.'/auth.php';
