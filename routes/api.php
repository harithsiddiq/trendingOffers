<?php


use \Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Authentication routes (public)
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

    // Protected routes (require authentication)
    Route::middleware('auth:sanctum')->group(function () {
        // Auth user routes
        Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
        Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user']);
        Route::put('/profile', [\App\Http\Controllers\AuthController::class, 'updateProfile']);
        Route::put('/change-password', [\App\Http\Controllers\AuthController::class, 'changePassword']);

        // API Resources (protected)

    });

    Route::apiResource('stores', \App\Http\Controllers\StoreController::class);
    Route::apiResource('regions', \App\Http\Controllers\RegionController::class);
    Route::apiResource('branches', \App\Http\Controllers\BranchController::class);
    Route::apiResource('menus', \App\Http\Controllers\MenuController::class);
    Route::apiResource('offers', \App\Http\Controllers\OfferController::class);
    Route::apiResource('store-images', \App\Http\Controllers\StoreImageController::class);
    Route::apiResource('favorites', \App\Http\Controllers\FavoriteController::class);
    Route::apiResource('reviews', \App\Http\Controllers\ReviewController::class);
    Route::apiResource('store-links', \App\Http\Controllers\StoreLinkController::class);
    Route::apiResource('notifications', \App\Http\Controllers\NotificationController::class);
    Route::get('user-store/{user_id}', [\App\Http\Controllers\StoreController::class, 'userStore']);

    // Public routes (no authentication required)
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
});
