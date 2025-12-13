<?php

use App\Http\Controllers\SatisfactionController;
use Illuminate\Support\Facades\Route;

Route::get('/satisfacao/{token}', [SatisfactionController::class, 'show']);
Route::post('/satisfacao/{token}', [SatisfactionController::class, 'save']);
