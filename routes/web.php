<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashController::class, 'index'])->name('dashboard.index');

Route::resource('access', AccessController::class);
Route::resource('user', UserController::class);
Route::resource('product', ProductController::class);

Route::get('/access/{id}/delete', [AccessController::class, 'delete'])->name('access.delete');
Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
Route::get('/prodict/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
