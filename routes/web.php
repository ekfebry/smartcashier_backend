<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::post('/logout', [WebAuthController::class, 'logout']);

Route::get('/dashboard', [WebDashboardController::class, 'index'])->name('dashboard');
