<?php

namespace App;

class Connection
{

    private static $instance;

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            $instance = new \PDO('mysql:host=localhost;dbname=camps;charset=utf8', 'mysql', 'password');
        }

        return $instance;
    }
}