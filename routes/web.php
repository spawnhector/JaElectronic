<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\admin\CategoryComponent;
use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\AdminAddProductComponent;



Route::get('/',HomeComponent::class);

Route::get('/home',HomeComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/cart',CartComponent::class);

Route::get('/checkout',CheckoutComponent::class);

Route::get('/login',LoginComponent::class);

Route::get('/register',RegisterComponent::class);

//For User or Customer
// Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

//For Admin
// Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
// Route::get('/admin/dashboard',AdminCategoryComponent::class)->name('admin.categories');
// Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
// Route::get('/admin/product/add',AdminAddProduct::class)->name('admin.addproducts');



