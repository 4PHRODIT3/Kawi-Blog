<?php

class App
{
    public static $storage;

    public static function bind($key, $data)
    {
        static::$storage[$key] = $data;
    }
    
    public static function getData($key)
    {
        return static::$storage[$key];
    }
}
