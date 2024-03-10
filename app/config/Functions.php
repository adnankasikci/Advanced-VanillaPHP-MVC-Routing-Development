<?php

namespace Config;

class Functions
{
    public static function base_url($uri)
    {
        $base_url = '/php';
        return $base_url . $uri;
    }

    public static function base_path($path)
    {
        $base_path = __DIR__ . '/../';
        return $base_path . $path;
    }

    public static function view($path, $data = null)
    {
        $base_path = self::base_path('views/' . $path);
        return require_once $base_path . '.php';
    }

    public static function model($path)
    {
        $base_path = self::base_path('models/' . $path);
        return require_once $base_path . '.php';
    }
}
