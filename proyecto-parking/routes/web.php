<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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

Route::get('/', [ConnectController::class, 'getLogin'] )->name('index');
Route::get('/login',[ConnectController::class, 'getLogin'])->name('login');
Route::post('/login',[ConnectController::class, 'postLogin'])->name('login');
Route::get('/register',[ConnectController::class, 'getRegister'])->name('register');
Route::post('/register',[ConnectController::class, 'postRegister'])->name('register');
Route::get('/logout',[ConnectController::class, 'getLogout'])->name('logout');




Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset',[ResetPasswordController::class, 'reset'])->name('password.update');



