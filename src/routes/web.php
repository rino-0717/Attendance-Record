<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\StampedController;
use App\Http\Controllers\AttendancedController;

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

//新規登録
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
Route::post('/register', [RegisteredUserController::class, 'register'])->name('register.store');


// ログイン
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.create');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/login', [AuthenticatedSessionController::class, 'destroy'])->name('login.destroy');

// 打刻
Route::get('/stamp', [StampedController::class, 'create'])->name('stamps.create');
Route::post('/stamp', [StampedController::class, 'store'])->name('stamps.store');

// 日付別勤怠情報一覧
Route::get('/attendances', [AttendancedController::class, 'index'])->name('attendances.index');
