<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ProductController;



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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::resource('/product', ProductController::class);




});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
