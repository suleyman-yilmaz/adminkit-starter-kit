<?php

use App\Http\Controllers\Backend\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('checkBackendAuth')->prefix('/backend')
    ->name('backend.')->group(function () {
    Route::view('/', 'backend.index')->name('index');

    Route::controller(ProfileController::class)->prefix('/profile')
        ->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
    });
});
