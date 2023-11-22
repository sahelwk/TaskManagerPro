<?php

namespace App\Providers;
use LaravelBundler\Bundy\BundledScripts;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use PharIo\Manifest\BundlesElement;
use Illuminate\Support\Facades\Gate;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     *
     *
     */

    //  Gate::before(function ($user, $ability) {
    //     if ($user->hasRole(env('APP_SUPER_ADMIN', 'super-admin'))) {
    //         return true;
    //     }
    // });
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }

    public function register()
{
//     if ($this->app->environment('local')) {
//         $this->app->bind(BundledScripts::class, function () {
//             return new BundledScripts([
//                return redirect()->route('dashboard');
//             ]);
//         });
//     }
// }
}
}
