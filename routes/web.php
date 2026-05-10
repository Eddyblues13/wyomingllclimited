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
});
