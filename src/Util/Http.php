<?php

namespace PHPieces\Framework\Util;

class Http
{
    public function get($url)
    {
        if (function_exists("curl_init")) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $content = curl_exec($ch);
            curl_close($ch);
            return $content;
        } else {
            return file_get_contents($url);
        }
    }
}