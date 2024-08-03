<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/profile', [UserController::class,'show'])->middleware('auth')->name('profile');
Route::put('/profile', [UserController::class,'update'])->middleware('auth');
Route::put('/change-password', [UserController::class,'changePassword'])->middleware('auth');
Route::get('/change-password', [UserController::class,'showFormChangePassword'])->middleware('auth')->name('change-pass');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class,'index'])->name('admin');
    Route::post('/admin/users/{user}/toggle-active', [AdminController::class,'toggleActive']);
});

