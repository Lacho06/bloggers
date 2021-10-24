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

Route::get('login', [LoginController::class, 'create'])->name('login.create');

Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');


Route::resource('post', PostController::class)->names('post');

Route::resource('admin', AdminController::class)->names('admin');

Route::resource('tag', TagController::class)->names('tag');


