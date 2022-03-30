<?php

namespace App\Core;

class Request
{
    /**
     * @return false|mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos('?', $path);

        if ($position === false) {
            return $path;
        }

        return substr($path, 0 , $position);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}