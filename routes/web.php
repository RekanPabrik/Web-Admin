<?php

use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\profileAdminController;
use App\Http\Controllers\admin\userReportController;
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
    return view('home-before-login/HomeBFLogin');
})->name('HomeBFLogin');

Route::get('/contactUS', function () {
    return view('home-before-login/contactUs');
})->name('contactUs');

Route::get('/aboutUS', function () {
    return view('home-before-login/aboutUs');
})->name('aboutUs');

Route::get('/createAccountHRD', function () {
    return view('auth/registerHRD');
})->name('registerHRD');

Route::get('/createAccountPelamar', function () {
    return view('auth/registerPelamar');
})->name('registerPelamar');

Route::get('/loginPage', function () {
    return view('auth/login');
})->name('login.form');
Route::post('/login', [AuthUserController::class, 'login'])->name('login.process');

Route::middleware(['checkLogin'])->group(function () {
    Route::get('/admin/Home', [homeController::class, 'homeAdmin'], function () {
        return view('admin/home');
    })->name('admin.home');

    Route::get('/admin/userReports', [userReportController::class, 'userReportsAdmin'], function () {
        return view('admin/user');
    })->name('admin.user');
    Route::delete('/admin/deletePelamar', [userReportController::class, 'deletePelamar'])->name('admin.deletePelamar');
    Route::delete('/admin/deleteAdmin', [userReportController::class, 'deleteAdmin'])->name('admin.deleteAdmin');
    Route::delete('/admin/deletePerusahaan', [userReportController::class, 'deletePerusahaan'])->name('admin.deletePerusahaan');
    
    Route::get('/admin/profile', [profileAdminController::class, 'profileAdmin'],function () {
        return view('admin/profile');
    })->name('admin.profile');
    Route::post('/admin/updateProfile', [profileAdminController::class, 'updateProfileAdmin'])->name('admin.updateProfile');


    Route::get('/pelamar/dashboard', [AuthUserController::class, 'home'], function () {
        return view('pelamar/pelamarPage');
    })->name('pelamar.dashboard');
});
