<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\auth\RegisterController;
use \App\Http\Controllers\auth\LoginController;
use \App\Http\Controllers\Admin\AdminDashboardController;
use \App\Http\Controllers\Admin\ManageUserController;
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

Route::view('/', 'index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [RegisterController::class, 'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
});

Route::post('/login/auth', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store'])->name('store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('destroy');


Route::group(['prefix' => 'admin','middleware' => 'isAdmin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin');
    Route::get('/feed', [AdminDashboardController::class, 'feed'])->name('feed');


    Route::get('/manage/', [ManageUserController::class, 'index'])->name('manage-user');
    Route::get('/manage/edit/{id}', [ManageUserController::class, 'edit'])->name('edit');
    Route::put('/manage/update/{user}', [ManageUserController::class, 'update'])->name('update');
    Route::delete('/manage/delete/{id}', [ManageUserController::class, 'destroy'])->name('delete');
});
