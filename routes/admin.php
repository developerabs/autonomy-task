<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;


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
  
});