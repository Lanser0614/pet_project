<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Module\User\Http\Controllers\SellerController;

Route::prefix('/users')->middleware("api")->namespace('users-v1')->group(function () {
    Route::get('/', [SellerController::class, 'all'])->name('all');
    Route::get('/{id?}', [SellerController::class, 'show'])->name('show');
    Route::post('/', [SellerController::class, 'create'])->name('create');
    Route::put('/{id?}', [SellerController::class, 'updateContent'])->name('updateContent');
    Route::delete('/{id?}', [SellerController::class, 'delete'])->name('delete');
});


Route::prefix('/sellers')->middleware("api")->namespace('sellers-v1')->group(function () {
    Route::post('/register', [SellerController::class, 'register'])->name('register');
    Route::post('/verify', [SellerController::class, 'verify'])->name('verify');
    Route::post('/login', [SellerController::class, 'login'])->name('login');
    Route::get('/logout', [SellerController::class, 'logout'])->name('updateContent');
});
