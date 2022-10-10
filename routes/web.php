<?php

use Illuminate\Support\Facades\Route;

/**
 * Controllers
 */

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;

/**
 * Guest
 */
Route::group(['middleware' => ['guest']], function () {
    /**
     * Auth
     */
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/remember', [AuthController::class, 'remember'])->name('auth.remember');
});

/**
 * Authenticated
 */
Route::group(['middleware' => ['auth']], function () {
    /**
     * Auth
     */
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    /**
     * Dashboard
     */
    Route::get('/admin', [HomeController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/sales', [HomeController::class, 'sales'])->name('dashboard.sales');

    /**
     * Products
     */
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/admin/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    /**
     * Sellers
     */
    Route::get('/admin/sellers', [SellerController::class, 'index'])->name('sellers.index');
    Route::get('/admin/sellers/create', [SellerController::class, 'create'])->name('sellers.create');
    Route::post('/admin/sellers/store', [SellerController::class, 'store'])->name('sellers.store');
    Route::get('/admin/sellers/edit/{id}', [SellerController::class, 'edit'])->name('sellers.edit');
    Route::put('/admin/sellers/update/{id}', [SellerController::class, 'update'])->name('sellers.update');
    Route::post('/admin/sellers/destroy/{id}', [SellerController::class, 'destroy'])->name('sellers.destroy');

    /**
     * Users
     */
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/admin/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    /**
     * Orders
     */
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/admin/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/admin/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/admin/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/admin/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::post('/admin/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

    /**
     * Logs
     */
    Route::get('/admin/logs', [LogController::class, 'index'])->name('logs.index');
    Route::get('/admin/logs/create', [LogController::class, 'create'])->name('logs.create');
    Route::post('/admin/logs/store', [LogController::class, 'store'])->name('logs.store');
    Route::get('/admin/logs/edit/{id}', [LogController::class, 'edit'])->name('logs.edit');
    Route::put('/admin/logs/update/{id}', [LogController::class, 'update'])->name('logs.update');
    Route::post('/admin/logs/destroy/{id}', [LogController::class, 'destroy'])->name('logs.destroy');
    Route::post('/admin/logs/clear', [LogController::class, 'clear'])->name('logs.clear');
});
