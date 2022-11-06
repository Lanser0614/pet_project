<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Module\User\Http\Controllers\UserController;

Route::prefix('/users')->middleware("api")->namespace('users-v1')->group(function () {
    Route::get('/', [UserController::class, 'all'])->name('all');
    Route::get('/{id?}', [UserController::class, 'show'])->name('show');
    Route::post('/', [UserController::class, 'create'])->name('create');
    Route::put('/{id?}', [UserController::class, 'updateContent'])->name('updateContent');
    Route::delete('/{id?}', [UserController::class, 'delete'])->name('delete');
});


Route::prefix('/sellers')->middleware("api")->namespace('sellers-v1')->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/verify', [UserController::class, 'verify'])->name('verify');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/logout', [UserController::class, 'logout'])->name('updateContent');
});
