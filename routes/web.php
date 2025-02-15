<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [BlogController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
// Route::get('/addblog', [App\Http\Controllers\HomeController::class, 'addblog'])->name('addblog');
Route::get('/addblog', [BlogController::class, 'create'])->name('addblog');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

Route::get('/editblog/{id}', [BlogController::class, 'edit'])->name('editblog');
Route::put('/editblog/{id}', [BlogController::class, 'update'])->name('blog.update');

Route::delete('/deleteblog/{id}', [BlogController::class, 'destroy'])->name('deleteblog');

Route::get('/allblog', [BlogController::class, 'allblog'])->name('allblog');
