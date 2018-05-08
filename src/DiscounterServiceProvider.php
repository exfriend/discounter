<?php

namespace Exfriend\Discounter;

use Illuminate\Support\ServiceProvider;

class DiscounterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom( __DIR__ . '/database/migrations' );
        //        $this->loadRoutesFrom( __DIR__ . '/routes.php' );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
