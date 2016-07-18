<?php

namespace PHPieces\Framework;

use Dotenv\Dotenv;

class Config
{
    public function load($dir)
    {
        $dotenv = new Dotenv($dir);

        $dotenv->load();
    }
}
