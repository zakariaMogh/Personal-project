<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login',[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,'index'])->name('login.index');
Route::post('login',[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,'login'])->name('login');

Route::middleware('auth:admin')->group(function (){
    Route::any('logout',[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,'logout'])->name('logout');
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class)->except(['create', 'store']);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});

