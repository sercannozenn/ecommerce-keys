<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CardController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\OrderController;
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
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::prefix('admin')->group(function ()
{
    Route::get('login', [\App\Http\Controllers\AdminAuth\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [\App\Http\Controllers\AdminAuth\LoginController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AdminAuth\LoginController::class, 'logout'])->name('admin.logout');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('order', [OrderController::class, 'order'])->name('order');
Route::get('checkout', [CardController::class, 'checkout'])->name('checkout')->middleware('checkout');
Route::get('/card-clear', [CardController::class, 'cardClear'])->name('card.clear');
Route::get('/card', [CardController::class, 'card'])->name('card');
Route::post('/card-update', [CardController::class, 'cardUpdate'])->name('card.update');
Route::post('/card-init', [CardController::class, 'init'])->name('card.init');
Route::post('/card-add', [CardController::class, 'add'])->name('card.add');
Route::post('/card-remove', [CardController::class, 'remove'])->name('card.remove');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'viewDetail'])->name('product.viewDetail');

Route::get('without-register', [HomeController::class, 'withoutRegister'])->name('withoutRegister');
