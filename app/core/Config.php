<?php


class Config
{
    public static $config;

    public static function get($filename)
    {
        if (!self::$config) {

            $config_file = '../app/config/' . $filename . '.php';

            if (!file_exists($config_file)) {
                return false;
            }

            self::$config = require $config_file;
        }

        return self::$config;
    }
}
