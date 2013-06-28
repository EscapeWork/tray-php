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
            'base'         => 'https://api.traycheckout.com.br/v2', 
            'notification' => '/transactions/get_by_token/', 
        ), 

        # test environment
        'testing'    => array(
            'base'         => 'https://api.sandbox.traycheckout.com.br/v2', 
            'notification' => '/transactions/get_by_token/', 
        ), 
    );
}