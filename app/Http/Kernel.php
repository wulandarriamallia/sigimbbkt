<?php

namespace sigimbbkt\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \sigimbbkt\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \sigimbbkt\Http\Middleware\VerifyCsrfToken::class,
//            \sigimbbkt\Http\Middleware\NonsecMiddleware::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \sigimbbkt\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'api' => \sigimbbkt\Http\Middleware\ApiMiddleware::class,
        'cors' => \sigimbbkt\Http\Middleware\CorsMiddleware::class,
        'su' => \sigimbbkt\Http\Middleware\SuMiddleware::class,
        'front_office' => \sigimbbkt\Http\Middleware\FrontOfficeMiddleware::class,
        'kepala_bidang' => \sigimbbkt\Http\Middleware\KepalaBidangMiddleware::class,
        'adm' => \sigimbbkt\Http\Middleware\AdmMiddleware::class,
        'pemohon' => \sigimbbkt\Http\Middleware\PemohonMiddleware::class,
        'visitors' => \sigimbbkt\Http\Middleware\VisitorsMiddleware::class
    ];
}
