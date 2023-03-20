<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CollectionsController;


Route::prefix('collections')->group(function () {
    Route::get('/list', [CollectionsController::class, 'listCollections']);
});

Route::prefix('products')->group(function () {
    Route::get('/list/{id}', [ProductsController::class, 'listProducts']);
});

Route::prefix('checkout')->group(function () {
    Route::post('/place-order',[CheckoutController::class, 'placeOrder']);
});


Route::get('/{any}', function () {
    return view('checkout.index');
})->where('any', '.*');
