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


Route::get('login',[\App\Http\Controllers\Auth\LoginController::class,'index'])->name('login.index');
Route::post('login',[\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');

Route::get('register',[\App\Http\Controllers\Auth\RegisterController::class,'index'])->name('register.index');
Route::post('register',[\App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');

Route::get('password/reset/{token}',[\App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',[\App\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('reset');

Route::get('forgot/password',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('forgot.password.email');
Route::post('forgot/password',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('forgot.password.send');

Route::middleware('auth:user')->group(function () {
    Route::any('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::post('/posts/comment', [\App\Http\Controllers\PostController::class, 'storeComment'])->name('posts.comments.store');
    Route::delete('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'destroyComment'])->name('posts.comments.destroy');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact');
Route::post('/contact',[\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store')->middleware(['throttle:contact_us']);;


Route::redirect('/', 'home');
