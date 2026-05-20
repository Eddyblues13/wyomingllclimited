<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Public pages
Route::get('/', function () {
    return view('home.home');
});

Route::get('/start', function () {
    return view('home.start');
});

Route::get('/new', function () {
    return view('home.new-company');
});

Route::get('/existing', function () {
    return view('home.existing-company');
});

// Test Error Pages
Route::get('/errors/{code}', function ($code) {
    if (in_array($code, ['401', '403', '404', '419', '429', '500', '503'])) {
        abort($code);
    }
    abort(404);
});

// User Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/api/register-company', [AuthController::class, 'registerCompany']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/verify', [AuthController::class, 'showVerify'])->name('verify');
Route::post('/verify', [AuthController::class, 'verify']);
Route::post('/resend-code', [AuthController::class, 'resendCode']);

// User Protected routes
Route::middleware(['auth', 'verified', 'update.last_seen'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/crypto', function () { return view('dashboard.crypto'); })->name('crypto');
    Route::get('/crypto/stake', function () { return view('dashboard.crypto-stake'); })->name('crypto.stake');
    Route::get('/crypto/swap', function () { return view('dashboard.crypto-swap'); })->name('crypto.swap');
    Route::get('/crypto/account', function () { return view('dashboard.crypto-account'); })->name('crypto.account');
    Route::get('/crypto/link-wallet', [DashboardController::class, 'showLinkWallet'])->name('crypto.link-wallet');
    Route::post('/crypto/link-wallet', [DashboardController::class, 'linkWallet'])->name('crypto.link-wallet.post');
    Route::get('/crypto/receive', [DashboardController::class, 'showReceive'])->name('crypto.receive');
    Route::get('/crypto/receive/details', [DashboardController::class, 'showReceiveDetails'])->name('crypto.receive.details');
    Route::get('/crypto/buy', [DashboardController::class, 'showBuy'])->name('crypto.buy');
    Route::get('/crypto/cards', [DashboardController::class, 'showCards'])->name('crypto.cards');
    Route::post('/crypto/cards', [DashboardController::class, 'applyCard'])->name('crypto.cards.apply');
    Route::post('/crypto/cards/toggle-status', [DashboardController::class, 'toggleCardStatus'])->name('crypto.cards.toggle');
});

// Admin Auth routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Admin Protected routes
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::get('/users/{id}', [AdminDashboardController::class, 'viewUser'])->name('admin.users.view');
    Route::delete('/users/{id}', [AdminDashboardController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/companies', [AdminDashboardController::class, 'companies'])->name('admin.companies');
    Route::patch('/companies/{id}/status', [AdminDashboardController::class, 'updateCompanyStatus'])->name('admin.companies.status');
    Route::delete('/companies/{id}', [AdminDashboardController::class, 'deleteCompany'])->name('admin.companies.delete');
    Route::get('/crypto-settings', [AdminDashboardController::class, 'cryptoSettings'])->name('admin.crypto-settings');
    Route::post('/crypto-settings', [AdminDashboardController::class, 'updateCryptoSettings'])->name('admin.crypto-settings.update');
});
