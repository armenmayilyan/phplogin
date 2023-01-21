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
        return $row;
    }
    public static function getWhere($data)
    {
        $conn = Config::connect();
        $table = self::getTable();
        $where = '';
        $index = 0;
        foreach ($data as $column => $value) {
            if ($index < 1) {
                $where .= "WHERE `$column` = '{$value}' ";
            } else {
                $where .= "OR `$column` = '{$value}' ";
            }
            $index ++;
        }
        $sql = "SELECT * FROM $table $where";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        print_r($row);
        return $row['email'];
    }


    public static function getTable()
    {
        return self::$table;
    }
}