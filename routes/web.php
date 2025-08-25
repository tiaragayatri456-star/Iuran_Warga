<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Models\Payment;
use App\Models\Pembayaran;
use App\Models\User;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/iuran', [UserController::class, 'iuran']);

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [WargaController::class, 'store']);
Route::get('/warga', [WargaController::class, 'index'])->name('admin.warga');
Route::get('/warga/edit/{id}', [WargaController::class, 'edit'])->name('warga.edit');
Route::post('/warga/update/{id}', [WargaController::class, 'update'])->name('warga.update');
Route::delete('/warga/delete/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
Route::get('/pembayaran', [PaymentController::class, 'index'])->name('pembayaran.admin');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('users', UserController::class)->except(['show']);
});

Route::get('/login-warga', [WargaController::class, 'showLoginForm'])->name('login.warga');
Route::post('/login-warga', [WargaController::class, 'login']);
Route::get('/logout-warga', [WargaController::class, 'logout'])->name('logout.warga');

Route::get('/warga/home', function () {
    if (!session()->has('warga')) {
        return redirect('/login-warga');
    }
    return view('warga.home');
})->name('warga.home');

Route::get('/category', [CategoryController::class, 'index'])->name('category.admin');
Route::get('/administrator/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/administrator/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/administrator/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/administrator/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/create', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payments/status/{id}', [PaymentController::class, 'ubahStatus'])->name('payment.ubahStatus');

