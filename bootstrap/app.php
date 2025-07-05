<?php

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
        $middleware->use([
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Add cookies to response
            \Illuminate\Session\Middleware\StartSession::class,    // 🔑 Starts the session
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Share session errors with views
            \App\Http\Middleware\SetLocaleFromSession::class,      // 🌐 Your locale switcher middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
