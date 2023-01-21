<?php

namespace traits;
include '/home/arm/Desktop/phplogin/phplogin/config.php';

use Config\Config;

trait Queriable
{
    public static function create($data)
    {

        $conn = Config::connect();
        $columns = implode(',', array_map(function ($column) {
            return "`$column`";
        }, array_keys($data)));
        var_dump($columns);

        $table = self::getTable();
        $sql = <<<SQL
 INSERT INTO $table ($columns)
VALUES ('{$data['name']}','{$data['email']}','{$data['password']}')
SQL;
        $result = $conn->query($sql);
        return $result;
    }

    public static function getUser($data)
    {
        $conn = Config::connect();
        $table = self::getTable();
        $sql = "SELECT * FROM $table WHERE `email` = `$data`";
        $results = $conn->query($sql);
        var_dump($results);
        $row = $results->fetch_assoc();
        var_dump($row);
        return $row;
    }
    public static function getByEmail($data)
    {
        $conn = Config::connect();
        $table = self::getTable();
        $sql = "SELECT * FROM $table WHERE `email` = '{$data}'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        var_dump($row);
        return $row['email'];


    }


    public static function getTable()
    {
        return self::$table;
    }
}