<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\StampedController;
use App\Http\Controllers\AttendanceController;

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
Auth::routes();

//新規登録
Route::get('register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisteredUserController::class, 'register']);

// ログイン
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// 打刻
Route::get('/stamp', [StampedController::class, 'create'])->name('stamps.create');
Route::post('/stamp', [StampedController::class, 'store'])->name('punch.store');
Route::post('/start-work', [AttendanceController::class, 'startWork'])->name('stamp.startWork');
Route::post('/end-work', [AttendanceController::class, 'endWork'])->name('stamp.endWork');
Route::post('/start-break', [AttendanceController::class, 'startBreak'])->name('stamp.startBreak');
Route::post('/end-break', [AttendanceController::class, 'endBreak'])->name('stamp.endBreak');

// 日付別勤怠情報一覧
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendance.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
