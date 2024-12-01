<?php

use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\laporanController;
use App\Http\Controllers\admin\pengaduanController;
use App\Http\Controllers\admin\profileAdminController;
use App\Http\Controllers\admin\userReportController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\resetPassword;
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
Route::post('/addPengaduan', [pengaduanController::class, 'addPengaduan'])->name('pengaduan');

Route::get('/aboutUS', function () {
    return view('home-before-login/aboutUs');
})->name('aboutUs');

Route::get('/inputEmailResetPass', function () {
    return view('auth/inputEmailResetPass');
})->name('inputEmailResetPass');

Route::get('/createAccountHRD', function () {
    return view('auth/registerHRD');
})->name('registerHRD');
Route::post('/createAccountPerusahaan', [AuthUserController::class, 'addPerusahaan'])->name('addPerusahaan');

Route::get('/createAccountPelamar', function () {
    return view('auth/registerPelamar');
})->name('registerPelamar');
Route::post('/createAccountPelamar', [AuthUserController::class, 'addPelamar'])->name('addPelamar');

Route::get('/loginPage', function () {
    return view('auth/login');
})->name('login.form');
Route::post('/login', [AuthUserController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthUserController::class, 'logout'])->name('logout');


Route::post('/reqResetPass', [resetPassword::class, 'requestResetPass'])->name('requestResetPass');
Route::get('/resetPassword/{token}', [resetPassword::class, 'showResetPasswordForm'])->name('resetPassword');
Route::post('/resetPassword/{token}', [resetPassword::class, 'resetPassword'])->name('reset.password');

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
    Route::post('/admin/addAdmin', [userReportController::class, 'addAdmin'])->name('admin.addAdmin');

    Route::get('/admin/pengaduan', [pengaduanController::class, 'mainPengaduan'], function () {
        return view('admin/pengaduan');
    })->name('admin.pengaduan');
    Route::delete('/admin/deleteLaporan', [pengaduanController::class, 'deletePengaduan'])->name('admin.deletePengaduan');
    
    Route::get('/admin/laporan', [laporanController::class, 'mainDataLaporan'],function () {
        return view('admin/laporan');
    })->name('admin.laporan');

    Route::get('/admin/profile', [profileAdminController::class, 'profileAdmin'],function () {
        return view('admin/profile');
    })->name('admin.profile');
    Route::post('/admin/updateProfile', [profileAdminController::class, 'updateProfileAdmin'])->name('admin.updateProfile');


    Route::get('/pelamar/dashboard', [AuthUserController::class, 'home'], function () {
        return view('pelamar/pelamarPage');
    })->name('pelamar.dashboard');
});
