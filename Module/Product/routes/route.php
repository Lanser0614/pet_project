<?php
declare(strict_types=1);


use Illuminate\Support\Facades\Route;
use Module\Product\Http\Controllers\ProductController;

Route::prefix('/products')->middleware("auth:sanctum")->namespace('products-v1')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('all');
    Route::post('/', [ProductController::class, 'store'])->name('shop.store');
    Route::put('/{id?}', [ProductController::class, 'updateContent'])->name('shop.update-content');
    Route::delete('/{id?}', [ProductController::class, 'delete'])->name('shop.delete');
    Route::get('/{id?}/{shop_id}', [ProductController::class, 'show'])->name('shop.show');
});
