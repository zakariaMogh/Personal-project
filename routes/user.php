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

Route::get('login',[\App\Http\Controllers\User\Auth\LoginController::class,'index'])->name('login.index');
Route::post('login',[\App\Http\Controllers\User\Auth\LoginController::class,'login'])->name('login');

Route::get('register',[\App\Http\Controllers\User\Auth\RegisterController::class,'index'])->name('register.index');
Route::post('register',[\App\Http\Controllers\User\Auth\RegisterController::class,'register'])->name('register');

Route::get('password/reset/{token}',[\App\Http\Controllers\User\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',[\App\Http\Controllers\User\Auth\ResetPasswordController::class,'reset'])->name('reset');

Route::get('forgot/password',[\App\Http\Controllers\User\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('forgot.password.email');
Route::post('forgot/password',[\App\Http\Controllers\User\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('forgot.password.send');


Route::middleware('auth')->group(function (){
    Route::any('logout',[\App\Http\Controllers\User\Auth\LoginController::class,'logout'])->name('logout');
    Route::get('',[\App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');
    Route::resource('posts', \App\Http\Controllers\User\PostController::class);

    Route::middleware('admin')->group(function (){
        Route::resource('users', \App\Http\Controllers\User\UserController::class);
        Route::resource('categories', \App\Http\Controllers\User\CategoryController::class);
    });

    Route::post('/posts/comment', [\App\Http\Controllers\PostController::class, 'storeComment'])->name('posts.comments.store');
    Route::delete('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'destroyComment'])->name('posts.comments.destroy');

});

