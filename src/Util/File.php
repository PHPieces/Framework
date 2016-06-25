<?php

namespace PHPieces\Framework\Util;

class File
{

    public function exists($filename) 
    {
        return file_exists($filename);
    }

    public function get($path) 
    {
        return file_get_contents($path);
    }

    public function put($path, $contents)
    {
        $result = file_put_contents($path, $contents);
       
        return $result;
    }
    
    public function time($path)
    {
        return filemtime($path);
    }
    
}
