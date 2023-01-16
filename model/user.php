<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

use Config;

class User
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

    public static function getAllUsers()
    {

        $conn = Config::connect();
        $sql = "SELECT * FROM users";
        $results = $conn->query($sql);
        $results->fetch_assoc();
        return $results;


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

    public static function updateUser($data)
    {
        $conn = Config::connect();
        $sql = "UPDATE users
SET name='{$data['name']}', email='{$data['email']}',password='{$data['pass']}' 
WHERE id='{$data['id']}'";
        $conn->query($sql);


    }

    public static function deleteUser($data)
    {
        $id = (int)$data;
        $conn = Config::connect();
        $sql = "ALTER TABLE users
DROP COLUMN  {$id}";
        $conn->query($sql);


    }

    public static function pivote()
    {
        $conn = Config::connect();
        $sql = "SELECT *
FROM users
         LEFT JOIN role_user ru on users.id = ru.user_id

         LEFT JOIN role
                    ON ru.role_id = role.id";
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row;
    }
}


