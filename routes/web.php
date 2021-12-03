<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('login')->middleware('alreadyLoggedin');
Route::post('/', [UserController::class, 'loginStore'])->name('userlogin');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'registerStore'])->name('registration');

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedin');
Route::get('dashboard/user-delete/{id}', [UserController::class, 'daleteUser'])
          ->middleware('alreadyLoggedin','isLoggedin');
