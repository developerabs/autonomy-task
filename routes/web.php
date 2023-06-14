<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('jobs',[HomeController::class, 'allJobs'])->name('allJobs');
Route::get('job-details/{id}/{slug}',[HomeController::class, 'jobDetails'])->name('jobDetails');
Route::get('apply-job/{id}/{slug}',[HomeController::class, 'applyJob'])->name('applyJob');