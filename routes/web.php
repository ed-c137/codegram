<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PostController::class, 'index']);
Route::post('follow/{user}', [FollowsController::class, 'store']);
Auth::routes();
//order of route is important
Route::get('/home', [ProfileController::class, 'index'])->name('home');
Route::get('/user', [PostController::class, 'use']);

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/p/create', [PostController::class, 'create'])->name('post.create');
Route::post('/p', [PostController::class, 'store'])->name('post.store');
Route::get('/p/{post}', [PostController::class, 'show'])->name('post.show');

