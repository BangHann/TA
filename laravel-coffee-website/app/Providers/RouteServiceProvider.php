<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    // public const HOME = '/gateway';
    public const HOME = '/dashboard';
    

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    // public function redirectTo()
    // {
    //     if (Auth::check()) {
    //         // Periksa peran pengguna setelah login
    //         $role = Auth::user()->role;

    //         // Redirect ke rute yang sesuai berdasarkan peran pengguna
    //         if ($role === 'admin') {
    //             return route('admin.main');
    //         } else {
    //             return route('index_kopi');
    //         }
    //     }

    //     return route('login'); // Default redirect jika tidak ada pengguna yang login
    // }
}
