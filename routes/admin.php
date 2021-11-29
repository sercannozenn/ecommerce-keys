<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('products/{product}/feature-image/{image}', [ProductController::class, 'featureImage'])->name('products.featureImage')->whereNumber(['product', 'image']);
Route::get('products/{product}/delete-image/{image}', [ProductController::class, 'deleteImage'])->name('products.deleteImage')->whereNumber(['product', 'image']);
Route::resource('products', 'Admin\ProductController');
