<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/', \App\Http\Livewire\Home::class)->name('home');

Route::get('/shop', \App\Http\Livewire\Shop::class)->name('shop');

Route::get('/shop/{product_id}', \App\Http\Livewire\ShopShow::class)->name('shop.show');

Route::get('/contact', \App\Http\Livewire\Contact::class)->name('contact');

Route::get('/cart', \App\Http\Livewire\CartComponent::class)->name('cart.index');

Route::get('/order/{id}',\App\Http\Livewire\OrderShow::class)->middleware('auth')->name('order.show');

Route::resource('/product',ProductController::class);

Route::get('/product/create', \App\Http\Livewire\ProductCreate::class)->name('product.create');

Route::get('/product/edit/{id}', \App\Http\Livewire\ProductEdit::class)->name('product.edit');


Route::get('dashboard', \App\Http\Livewire\DashboardComponent::class)->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
