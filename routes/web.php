<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pro', 'App\Http\Controllers\ProductController');
Route::post('pro/{post}/add', [App\Http\Controllers\ProductController::class, 'add'])->name('pro.add');

Route::resource('cate', 'App\Http\Controllers\CategoryController');

Route::resource('dash', 'App\Http\Controllers\DashboardController');

Route::resource('pos', 'App\Http\Controllers\POSController');
Route::post('pos/{post}/add', [App\Http\Controllers\POSController::class, 'add'])->name('pos.add');
