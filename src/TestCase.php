<?php

namespace PHPieces\Framework;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function getClient($app)
    {
        $client = new \PHPieces\Framework\Client();

        $client->app = $app;
        
        return $client;
    }
}
