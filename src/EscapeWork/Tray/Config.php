<?php namespace EscapeWork\Tray;

class Config
{

    /**
     * Account token
     */
    public static $token_account;

    /**
     * Environment
     */
    public static $environment = 'production';

    /**
     * URL's
     */
    public static $urls = array(
        'production' => array(
            'base'         => 'https://api.traycheckout.com.br/edge', 
            'notification' => '/transactions/get_by_token/', 
            'cart'         => '/tmp_transactions/create', 
        ), 

        # test environment
        'testing'    => array(
            'base'         => 'https://api.sandbox.traycheckout.com.br/edge', 
            'notification' => '/transactions/get_by_token/', 
            'cart'         => '/tmp_transactions/create', 
        ), 
    );

    /**
     * Returning the token account URL
     */
    public static function getTokenAccount()
    {
        return static::$token_account;
    }

    /**
     * Returning the base URL
     */
    public static function getBaseURL()
    {
        return static::$urls[static::$environment]['base'];
    }

    /**
     * Returning the API cart URL
     */
    public static function getCartURL()
    {
        return static::$urls[static::$environment]['cart'];
    }

    /**
     * Returning the API notification URL
     */
    public static function getNotificationURL()
    {
        return static::$urls[static::$environment]['notification'];
    }
}