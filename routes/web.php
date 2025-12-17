<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

//formularios
Route::prefix('form')->group(function () {
    Route::get('/satisfaction/{token}', [FormController::class, 'show'])->name('form.show');
    Route::post('/satisfaction/{token}', [FormController::class, 'save'])->name('form.submit');

});

//logins e criação de usuários
Route::get('/administration/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/administration/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login.submit');
Route::get('/administration/users', [App\Http\Controllers\CreateUserController::class, 'showCreateForm'])->name('administration.users');
Route::post('/administration/users', [App\Http\Controllers\CreateUserController::class, 'createUser'])->name('administration.users.store');

//rotas protegidas por autenticação
Route::prefix('administration')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/forms', [App\Http\Controllers\FormAdminController::class, 'index'])->name('forms.index');
    Route::get('/forms/export', [App\Http\Controllers\FormAdminController::class, 'export'])->name('forms.export');
    Route::get('/forms/{id}', [App\Http\Controllers\FormAdminController::class, 'showForm'])->whereNumber('id')->name('forms.show');
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

Route::post('/api/form/create', [FormController::class, 'createForm'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);


