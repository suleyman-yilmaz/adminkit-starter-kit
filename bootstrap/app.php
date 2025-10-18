<?php

use App\Http\Middleware\Backend\AuthMiddleware as BackendAuthMiddleware;
use App\Http\Middleware\Backend\RedirectIfAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkBackendAuth' => BackendAuthMiddleware::class,
            'redirectIfAuth' => RedirectIfAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
