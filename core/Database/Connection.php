<?php

class Connection
{
    public static function make($config)
    {
        try {
            $pdo_options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $pdo = new PDO("mysql:host=".$config['mysql_host'].";dbname=".$config['dbname'], $config['username'], $config['password']);
            return $pdo;
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
