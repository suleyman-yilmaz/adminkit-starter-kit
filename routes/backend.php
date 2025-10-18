<?php

use Illuminate\Support\Facades\Route;

Route::middleware('checkBackendAuth')->group(function () {
    Route::view('/backend', 'backend.index')->name('backend.index');
});
