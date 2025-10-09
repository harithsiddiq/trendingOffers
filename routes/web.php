<?php

use Illuminate\Support\Facades\Route;
use App\Models\Store;
use App\Http\Controllers\StoreOwnerController;

Route::get('/', function () {
    return  now()->format('Y-m-d') <= '2025-10-09' && now()->format('Y-m-d') >= '2025-08-08' ? 'true' : 'false';
});

Route::get('store', function () {
    Store::factory()->count(2)->create();
    return 'Stores created';
});

// Store Owner Registration Routes
Route::get('/register/store-owner', [StoreOwnerController::class, 'showRegistrationForm'])->name('store-owner.register');
Route::post('/register/store-owner', [StoreOwnerController::class, 'register'])->name('store-owner.register.submit');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Logout Route
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/register/store-owner');
})->name('logout');

// Store Management Routes (Protected)
Route::middleware('auth')->group(function () {
    // Store routes
    Route::get('/stores/create', [\App\Http\Controllers\StoreController::class, 'create'])->name('stores.create');
    Route::post('/stores', [\App\Http\Controllers\StoreController::class, 'storeWeb'])->name('stores.store');
    Route::get('/my-stores', [\App\Http\Controllers\StoreController::class, 'myStores'])->name('stores.index');
    Route::get('/stores/my', [\App\Http\Controllers\StoreController::class, 'myStores'])->name('stores.my');

    // Offer routes
    Route::get('/offers/create', [\App\Http\Controllers\OfferController::class, 'create'])->name('offers.create');
    Route::post('/offers', [\App\Http\Controllers\OfferController::class, 'storeWeb'])->name('offers.store');
    Route::get('/my-offers', [\App\Http\Controllers\OfferController::class, 'myOffers'])->name('offers.index');
    Route::get('/offers/my', [\App\Http\Controllers\OfferController::class, 'myOffers'])->name('offers.my');
});
