<?php

use App\Http\Controllers\AuthUserController;
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


Route::post('/login', [AuthUserController::class, 'Login'])->name('login');
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/test', function () {
    return view('adminPage');
});

Route::get('/admin/dashboard', function () {
    if (Auth::check()) {
        return view('adminPage');
    }
    return redirect()->route('login');
})->name('adminPage')->middleware('auth');
