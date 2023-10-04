<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* -------------------------
    Category Controller
--------------------------- */

Route::prefix('category')->group( function () {
    Route::post('/create', [CategoryController::class, 'create'])->name('Category.Create');
    Route::post('/update', [CategoryController::class, 'update'])->name('Category.Update');
    Route::post('/list', [CategoryController::class, 'list'])->name('Category.List');
    Route::post('/single', [CategoryController::class, 'single'])->name('Category.Single');
    Route::post('/delete', [CategoryController::class, 'delete'])->name('Category.Delete');
});

/* -------------------------
    Product Controller
--------------------------- */

Route::prefix('product')->group( function () {
    Route::post('/create', [ProductController::class, 'create'])->name('Product.Create');
    Route::post('/update', [ProductController::class, 'update'])->name('Product.Update');
    Route::post('/list', [ProductController::class, 'list'])->name('Product.List');
    Route::post('/single', [ProductController::class, 'single'])->name('Product.Single');
    Route::post('/delete', [ProductController::class, 'delete'])->name('Product.Delete');
});
