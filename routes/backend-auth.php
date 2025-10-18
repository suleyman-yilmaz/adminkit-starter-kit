<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('/backend')
    ->name('backend.auth.')->group(function () {
        Route::get('/login', 'show')->middleware('redirectIfAuth')->name('login');
        Route::post('/login/post', 'login')->name('login.post');
        Route::post('/logout', 'logout')->name('logout');
    });
