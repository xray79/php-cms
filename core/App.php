<?php


namespace App\Core;

use Exception;

class App
{
    // App is a dependency injection container
    public static $registry = [];

    public static function bind($key, $value)
    {
        // bind creates a new (kv) pair that contains the name of the dependency(k) and the required dependency(v)

        static::$registry[$key] = $value;
        // static is used bc in static methods you dont have access to $this
    }

    public static function get($key)
    {
        // get the dependency 
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception('no dependency for {$key}');
        }
        return static::$registry[$key];
    }
}
