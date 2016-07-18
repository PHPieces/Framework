<?php

namespace PHPieces\Framework\Util;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class File
{
    public function __construct($dir = '/')
    {
        $adapter = new Local($dir);

        $this->filesystem = new Filesystem($adapter);
    }

    public function exists($filename)
    {
        return $this->filesystem->has($filename);
    }

    public function get($path)
    {
        return $this->filesystem->read($path);
    }

    public function put($path, $contents)
    {
        $result = $this->filesystem->write($path, $contents);
       
        return $result;
    }
    
    public function time($path)
    {
        return $this->filesystem->getTimestamp($path);
    }
}
