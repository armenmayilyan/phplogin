<?php
include '../config.php';

use Config;

class user
{
    public static function create($data)
    {
        $conn = Config::connect();
        $sql = <<<SQL
 INSERT INTO users (`name`, `email`, `password`)
VALUES ('{$data['name']}','{$data['email']}','{$data['password']}')
SQL;
        $result = $conn->query($sql);
        return $result;
    }

    public static function getById($data)
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users WHERE `id` = '$data'";
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row;
    }

    public static function getByEmail($data)
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users WHERE `email` = '{$data}'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['email'];


    }

    public static function getUser($data)
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users WHERE `email` = '$data'";
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row;
    }
}


