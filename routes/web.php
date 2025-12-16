<?php

use App\Http\Controllers\SatisfactionController;
use Illuminate\Support\Facades\Route;

Route::prefix('form')->group(function () {
    Route::get('/satisfaction/{token}', [SatisfactionController::class, 'show']);
    Route::post('/satisfaction/{token}', [SatisfactionController::class, 'save']);

});
Route::get('/administration/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/administration/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login.submit');

Route::prefix('administration')->middleware('auth')->group(function () {
    Route::get('/users', [App\Http\Controllers\CreateUserController::class, 'showCreateForm'])->name('administration.users');
    Route::post('/users', [App\Http\Controllers\CreateUserController::class, 'createUser'])->name('administration.users.store');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});
