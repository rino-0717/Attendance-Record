<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\StampedController;
use App\Http\Requests\StampRequest;
use App\Http\Controllers\AttendancesController;

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
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);

// ログイン
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// 打刻
Route::get('/', [StampedController::class, 'create'])->name('stamps.create');
Route::post('/', [StampedController::class, 'punchIn']);
Route::post('/record-time', [StampedController::class, 'store'])->name('stamp.store');
Route::post('/end-work', [StampedController::class, 'endWork'])->name('stamp.endWork');
Route::post('/start-break', [StampedController::class, 'startBreak'])->name('stamp.startBreak');
Route::post('/end-break', [StampedController::class, 'endBreak'])->name('stamp.endBreak');

// 日付別勤怠情報一覧
Route::get('/attendance', [AttendancesController::class, 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
