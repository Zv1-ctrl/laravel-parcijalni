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
        //registracije middleware-a svih
        $middleware->alias([
            'admin'=> \App\Http\Middleware\CheckAdmin::class,
            'check.user'=> \App\Http\Middleware\CheckUser::class,
            'log.access'=> \App\Http\Middleware\LogAccess::class,
        ]);

        $middleware->append(\App\Http\Middleware\TerminateLogger::class);
        $middleware->append(\App\Http\Middleware\GlobalLogger::class);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
