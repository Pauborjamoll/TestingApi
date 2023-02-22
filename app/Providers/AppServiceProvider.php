<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('create-posts', function($user){
            return $user->role_id==2||3;
        });
        
        Gate::define('create-comments', function($user){
            return $user->role_id==2||3;
        });

        Gate::define('create-communities', function($user){
            return $user->role_id==2||3;
        });
    }
}
