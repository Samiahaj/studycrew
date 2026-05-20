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

    /**
 * Registreert custom middleware
 * voor admin beveiliging.
 *
 * De alias 'admin' wordt gekoppeld
 * aan AdminMiddleware.
 */
    ->withMiddleware(function (Middleware $middleware): void {
       /**
 * Maakt een middleware alias aan
 * zodat deze gebruikt kan worden
 * in routes/web.php.
 */
    $middleware->alias([
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
