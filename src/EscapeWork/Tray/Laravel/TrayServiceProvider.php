<?php namespace EscapeWork\Tray\Laravel;

use Illuminate\Support\ServiceProvider;
use EscapeWork\Tray\Config;

class TrayServiceProvider extends ServiceProvider
{

    public function register()
    {
        Config::$token_account = \Config::get('tray.token_account');
        Config::$environment   = \Config::get('tray.environment');
    }
}