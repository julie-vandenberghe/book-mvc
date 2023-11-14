<?php

namespace M2i\Mvc;

class Database
{
    private static $instance;

    public static function get()
    {
        if (null === self::$instance) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=php-recap', 'root', '');
        }

        return self::$instance;
    }
}
