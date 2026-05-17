<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

// ─────────────────────────────────────────────────────────────────────────────
// Public Routes (tidak perlu login)
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login',     [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',    [LoginController::class, 'login'])->name('login.post');
    Route::get('/register',  [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

Route::post('/logout', [LoginController::class, 'logout'])
     ->name('logout')
     ->middleware('auth');

// ─────────────────────────────────────────────────────────────────────────────
// Authenticated Routes (harus login)
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware('auth')->group(function () {

    // ─────────────────────────────────────────────────────────────────────
    // Anggota Routes
    // ─────────────────────────────────────────────────────────────────────
    Route::middleware('isAnggota')->group(function () {

        // Riwayat peminjaman
        Route::get('/peminjaman/history', [PeminjamanController::class, 'history'])
             ->name('peminjaman.history');

        // Form pinjam buku
        Route::get('/peminjaman/create', [PeminjamanController::class, 'anggotaCreate'])
             ->name('peminjaman.create');

        // Simpan peminjaman
        Route::post('/peminjaman', [PeminjamanController::class, 'anggotaStore'])
             ->name('peminjaman.store');
    });

    // ─────────────────────────────────────────────────────────────────────
    // Admin Routes
    // ─────────────────────────────────────────────────────────────────────
    Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CRUD Buku
        Route::resource('buku', BukuController::class);

        // CRUD Peminjaman
        Route::resource('peminjaman', PeminjamanController::class)
    ->except(['create', 'store']);

Route::patch(
    '/peminjaman/{peminjaman}/approve',
    [PeminjamanController::class, 'approve']
)->name('peminjaman.approve');

Route::patch(
    '/peminjaman/{peminjaman}/tolak',
    [PeminjamanController::class, 'tolak']
)->name('peminjaman.tolak');

        // Kembalikan buku
        Route::patch('/peminjaman/{peminjaman}/kembalikan', [PeminjamanController::class, 'kembalikan'])
             ->name('peminjaman.kembalikan');
             Route::patch(
    '/peminjaman/{peminjaman}/approve',
    [PeminjamanController::class, 'approve']
)->name('peminjaman.approve');

Route::patch(
    '/peminjaman/{peminjaman}/tolak',
    [PeminjamanController::class, 'tolak']
)->name('peminjaman.tolak');
Route::resource('peminjaman', PeminjamanController::class);
    });
});