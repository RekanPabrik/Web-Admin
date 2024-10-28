<?php

use App\Http\Controllers\AuthUserController;
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

Route::get('/', function () {
    return view('auth/login');
})->name('login.form');
Route::post('/login', [AuthUserController::class, 'login'])->name('login.process');

Route::middleware(['checkLogin'])->group(function () {
    Route::get('/admin/dashboard', [AuthUserController::class, 'home'], function () {
        return view('admin/adminPage');
    })->name('admin.dashboard');

    Route::get('/pelamar/dashboard', [AuthUserController::class, 'home'], function () {
        return view('pelamar/pelamarPage');
    })->name('pelamar.dashboard');
});
