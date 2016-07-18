<?php

namespace PHPieces\Framework;

use Symfony\Component\Debug\Debug;

trait Debuging
{
    public function debug()
    {
        if (getenv('DEBUG')) {
            Debug::enable();
        }
    }
}
