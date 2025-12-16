<?php

use App\Http\Controllers\JiraWebhookController;
use Illuminate\Support\Facades\Route;
Route::post('/jira/satisfaction', [JiraWebhookController::class, 'handle']);