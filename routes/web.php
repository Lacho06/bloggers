<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::get('login', [LoginController::class, 'create'])->name('login.create');

Route::post('forget', [LoginController::class, 'forgetPassword'])->name('login.forget');

Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('post/create/{id?}', [PostController::class, 'create'])->middleware('auth')->name('post.create');

Route::post('post/search', [PostController::class, 'search'])->name('post.search');

Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');

Route::resource('post', PostController::class)->except(['create', 'show'])->middleware('auth')->names('post');

Route::resource('admin', AdminController::class)->middleware('auth')->names('admin');

Route::get('tags', [TagController::class, 'userTags'])->middleware('auth')->name('tag.userTags');

Route::resource('tag', TagController::class)->middleware('auth')->names('tag');
