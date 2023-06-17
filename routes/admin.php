<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'IsAdmin']], function() {
   
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');
    // category routes 
    Route::resource('categories', CategoryController::class);
    // product crud routes 
    Route::resource('products', ProductController::class);
  
});