<?php

namespace App\Providers;

use App\Helper\ShopAuth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public $singletons = [
//        ShopAuth::class => ShopAuth::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerPolicies();

        //
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShopAuth::class, function ($app) {
            $request = Request::createFromGlobals();
            return new ShopAuth($request);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [ShopAuth::class];
    }
}
