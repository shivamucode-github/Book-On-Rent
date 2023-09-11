<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('/home',);
});

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Users Routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('createUser');
    Route::get('/admin/user/{user:slug}/edit', [UserController::class, 'edit']);
    Route::post('/admin/user/{user:slug}/update', [UserController::class, 'update']);
    Route::get('/admin/user/{user:slug}/delete', [UserController::class, 'destory']);

    // Category Routes
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories');
    Route::get('/admin/category/{category:slug}/edit', [CategoryController::class, 'edit']);
    Route::post('/admin/category/{category:slug}/update', [CategoryController::class, 'update']);
    Route::get('/admin/category/{category:slug}/delete', [CategoryController::class, 'destory']);

    // Author Roputes
    Route::get('/admin/authors', [AuthorController::class, 'index'])->name('authors');
    Route::post('/admin/authors', [AuthorController::class, 'store'])->name('authors');
    Route::get('/admin/author/{author:slug}/edit', [AuthorController::class, 'edit']);
    Route::post('/admin/author/{author:slug}/update', [AuthorController::class, 'update']);
    Route::get('/admin/author/{author:slug}/delete', [AuthorController::class, 'destory']);

    // Book Routes
    Route::get('/admin/books', [BookController::class, 'index'])->name('books');
    Route::post('/admin/books', [BookController::class, 'store'])->name('createBook');
    Route::get('/admin/book/{book:slug}/edit', [BookController::class, 'edit']);
    Route::post('/admin/book/{book:slug}/update', [BookController::class, 'update']);
    Route::get('/admin/book/{book:slug}/delete', [BookController::class, 'destory']);

    // Order Routes
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/admin/order/{order:id}/edit', [OrderController::class, 'edit']);
    Route::post('/admin/order/{order:id}/update', [OrderController::class, 'update']);
    Route::get('/admin/order/{order:id}/delete', [OrderController::class, 'destory']);
});


// Profile Route
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::fallback(function () {
    return back();
});
require __DIR__ . '/auth.php';
