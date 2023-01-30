<?php

namespace traits;
include $_SERVER['DOCUMENT_ROOT'] . '/Config.php';

use Config\Config;

trait Queryable

{
    public static function create($data)
    {
        var_dump($data, 123);
        $conn = Config::connect();
        $columns = implode(',', array_map(function ($column) {
            return "`$column`";
        }, array_keys($data)));
        $table = self::getTable();
        $sql = <<<SQL
 INSERT INTO $table ($columns)
VALUES ('{$data['name']}','{$data['email']}','{$data['password']}')
SQL;
        var_dump($sql, 123);
        $result = $conn->query($sql);
        return $result;
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
            $index++;
        }
        $sql = "SELECT * FROM $table $where";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public static function getRoles($userId)
    {
        $conn = Config::connect();
        $sql = "SELECT users.*, role.role_name
FROM users
         INNER JOIN role_user ru on users.id = {$userId}

         INNER JOIN role
                    ON  ru.role_id = role.id";
        $results = $conn->query($sql);

        $row = $results->fetch_assoc();
        return $row;
    }

    public static function getAllUsers()
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users";
        $results = $conn->query($sql);
        $results->fetch_assoc();
        return $results;


    }

    public static function update($data)
    {
        $conn = Config::connect();
        $id = (int)$data['id'];
        $sql = "UPDATE users
SET `name` = {$data['name']}, `email` = {$data['email']}, `password` = {$data['password']},
WHERE id = '{$id}'";

        $results = $conn->query($sql);

    }


    public static function getTable()
    {
        return self::$table;
    }
}