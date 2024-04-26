<?php

use App\Http\Controllers\BlingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlingController::class, 'renderHtmlPage']);
Route::post('/', [BlingController::class, 'receiveCredentials']);
Route::get('/auth', [BlingController::class, 'showAuthData']);
