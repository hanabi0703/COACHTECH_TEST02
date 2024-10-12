<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/search', [ProductController::class, 'search']);

Route::get('/products/register', [ProductController::class, 'add']);
Route::post('/products/register', [ProductController::class, 'register']);

// Route::get('/', [ProductController::class, 'edit']);
Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');

Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');

// Route::get('/products/{product}', [ProductController::class, 'update'])->name('products.update');
