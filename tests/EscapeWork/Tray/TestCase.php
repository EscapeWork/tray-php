<?php namespace EscapeWork\Tray;

use PHPUnit_Framework_TestCase;
use Mockery;

class TestCase extends PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        # Mockery
        Mockery::close();
    }
}