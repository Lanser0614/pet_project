<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Module\Shop\Http\Controllers\ShopController;

Route::prefix('/shops')->middleware("auth:sanctum")->namespace('shops-v1')->group(function () {
    Route::get('/', [ShopController::class, 'all'])->name('all');
    Route::get('/{id?}', [ShopController::class, 'show'])->name('show');
    Route::post('/', [ShopController::class, 'store'])->name('create');
    Route::put('/{id?}', [ShopController::class, 'updateContent'])->name('updateContent');
    Route::delete('/{id?}', [ShopController::class, 'delete'])->name('delete');
});
