<?php

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


Route::post('/loginSend', [App\Http\Controllers\UserController::class, 'login'])->name('home.loginSend');
Route::post('/registerSend', [App\Http\Controllers\UserController::class, 'register'])->name('home.registerSend');
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('home.logout');

Route::get('/login', [App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login');
Route::get('/register', [App\Http\Controllers\UserController::class, 'showRegistrationForm'])->name('register');


Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/webcontent', [App\Http\Controllers\WebContentController::class, 'index'])->name('webcontent');
    Route::put('webcontent/{id}/update', [App\Http\Controllers\WebContentController::class, 'update'])->name('contentweb.updatecontent');

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::put('products/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.updateProduct');
    Route::post('products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('products.storeProduct');
    Route::delete('products/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.deleteProduct');

    Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs');
    Route::put('blogs/{id}/update', [App\Http\Controllers\BlogController::class, 'update'])->name('blogs.updateBlog');
    Route::post('blogs/create', [App\Http\Controllers\BlogController::class, 'store'])->name('blogs.storeBlog');
    Route::delete('blogs/{id}/delete', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blogs.deleteBlog');
});

