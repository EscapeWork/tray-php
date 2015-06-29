<?php namespace EscapeWork\Tray\Laravel;

use Illuminate\Support\ServiceProvider;
use EscapeWork\Tray\Config;

class TrayServiceProvider extends ServiceProvider
{

    public function register()
    {
        Config::$token_account = $this->app['config']['services.tray.token_account'];
        Config::$environment   = $this->app['config']['services.tray.environment'];
    }
}