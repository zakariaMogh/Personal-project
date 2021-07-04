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

Route::middleware('auth:user')->group(function () {
    Route::any('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::post('/posts/comment', [\App\Http\Controllers\PostController::class, 'storeComment'])->name('posts.comments.store');
    Route::delete('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'destroyComment'])->name('posts.comments.destroy');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('home');

Route::redirect('/', 'home');
