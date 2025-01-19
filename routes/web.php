<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::controller(PostController::class)->prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/delete/{post}', [PostController::class, 'delete'])->name('post.delete');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
