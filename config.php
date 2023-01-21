<?php
namespace Config;
class Config
{
    public static function connect()
    {
        $config = [
            'hostname' => '127.0.0.1',
            'username' => 'arm',
            'password' => '1111',
            'database' => 'blog',

        ];
//        $dsn = "mysql:host={$config['hostname']};dbname={$config['database']}";
//        $database = new PDO($dsn,$config['username'],$config['password']);
//        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        return $database;
        return new \mysqli($config['hostname'], $config['username'], $config['password'], $config['database']);

    }
}


