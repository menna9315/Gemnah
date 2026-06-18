<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\ForceFrontendHttps;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(
            at: '*',
            headers: Request::HEADER_X_FORWARDED_PROTO | Request::HEADER_X_FORWARDED_PORT,
        );
        $middleware->append(ForceFrontendHttps::class);
        $middleware->redirectGuestsTo(fn () => route('backend.login'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function ($response, Throwable $exception, Request $request) {
            if (! $request->is('backend*')) {
                return $response;
            }

            $isUploadRequest = str_contains(
                (string) $request->headers->get('content-type'),
                'multipart/form-data'
            );

            if (! $isUploadRequest) {
                return $response;
            }

            if ($response->getStatusCode() === 419 && $request->hasSession()) {
                return redirect()
                    ->back()
                    ->withInput($request->except(['image', 'image2', 'home_image', 'size_chart_image']))
                    ->withErrors([
                        'image' => 'The form expired before the image was saved. Please choose the image again and save.',
                    ]);
            }

            if ($response->getStatusCode() === 413) {
                return response(
                    'The uploaded image is too large. Please go back and choose an image under 10 MB.',
                    413
                );
            }

            return $response;
        });
    })->create();
