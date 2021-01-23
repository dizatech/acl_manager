<?php

namespace Dizatech\AclManager;

use Dizatech\AclManager\View\Components\AclMenu;
use Illuminate\Support\ServiceProvider;

class AclManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views','aclManager');
        $this->mergeConfigFrom(__DIR__ . '/config/acl-manager.php', 'acl-manager');
        $this->publishes([
            __DIR__.'/config/acl-manager.php' =>config_path('acl-manager')
        ], 'acl-manager');
        $this->loadViewComponentsAs('', [
            AclMenu::class
        ]);
    }
}
