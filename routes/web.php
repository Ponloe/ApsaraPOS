<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Warehouse
Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse.index');
Route::post('/warehouse', [WarehouseController::class, 'store'])->name('warehouses.store');
Route::delete('/warehouses/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouses.destroy');

// Product
Route::get('/product', [InventoryController::class, 'index'])->name('product.index');
Route::get('/add-product', [InventoryController::class, 'create'])->name('product.create');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Order
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/remove', [OrderController::class, 'remove'])->name('orders.remove');
Route::post('/orders/update-quantity', [OrderController::class, 'updateQuantity'])->name('orders.updateQuantity');