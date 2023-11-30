<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('backend.layouts.template');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->controller(ProductController::class)->group(function () {
    Route::get('/product-all', 'index')->name('product.index');
    Route::get('/product-add', 'addproduct')->name('product.add');
    Route::post('/product-store', 'storeproduct')->name('product.store');
    Route::get('/product-edit/{id}', 'editproduct')->name('product.edit');
    Route::post('/product-update/{id}', 'updateproduct')->name('product.update');
    Route::get('/product-delete/{id}', 'deleteproduct')->name('product.delete');

    Route::get('/logout', 'logout')->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
