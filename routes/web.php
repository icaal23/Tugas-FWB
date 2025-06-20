<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransaksiPembeliController;

Route::get('/',[UserController::class,'pembeli'])->name('utama');

// Custom logout route for admin dashboard
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/admin/logout-redirect', function () {
    return view('users.index');
})->name('admin.logout.redirect');

Route::get('/menu', [UserController::class, 'menu'])->name('menu');


Route::get('/about', function () {
    return view('users.about');
})->name('about');

Route::get('/customer', function () {
    return view('users.customer');
})->name('customer');

Route::post('/beli/{mobil}', [TransaksiPembeliController::class, 'beli'])->name('beli.mobil');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
    // Route::post('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    // Route::post('admin/profile/upload', [\App\Http\Controllers\Admin\ProfileController::class, 'upload'])->name('admin.profile.upload');
    return view('admin.dashboard');
});

Route::prefix('admin/mobil')->name('admin.mobil.')->group(function () {
    Route::resource('mobil', \App\Http\Controllers\Admin\MobilController::class);
    Route::get('/', [\App\Http\Controllers\Admin\MobilController::class, 'index'])->name('index');
    Route::get('create', [\App\Http\Controllers\Admin\MobilController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Admin\MobilController::class, 'store'])->name('store');
    Route::get('edit/{id}', [\App\Http\Controllers\Admin\MobilController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [\App\Http\Controllers\Admin\MobilController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [\App\Http\Controllers\Admin\MobilController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/transaksi')->name('admin.transaksi.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\TransaksiController::class, 'index'])->name('index');
    Route::get('create', [\App\Http\Controllers\Admin\TransaksiController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Admin\TransaksiController::class, 'store'])->name('store');
    Route::get('edit/{id}', [\App\Http\Controllers\Admin\TransaksiController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [\App\Http\Controllers\Admin\TransaksiController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [\App\Http\Controllers\Admin\TransaksiController::class, 'destroy'])->name('destroy');

    Route::get('show/{id}', [\App\Http\Controllers\Admin\TransaksiController::class, 'show'])->name('show');

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('mobil', MobilController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
});

// Rute untuk autentikasi
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk admin (dengan middleware auth)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('mobil', MobilController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
});