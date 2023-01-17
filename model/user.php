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
SET name='{$data['name']}', email='{$data['email']}',password='{$data['password']}' 
WHERE id='{$data['id']}'";
        $conn->query($sql);
    }


    public static function deleteUser($data)
    {
        $id = (int)$data;
        $conn = Config::connect();
        $sql = "DELETE FROM users WHERE `id`  = '{$id}'";
        $conn->query($sql);


    }

    public static function roles($data, $id)
    {
        $conn = Config::connect();
        $sql = "SELECT users.*, role.role_name
FROM users
         INNER JOIN role_user ru on users.id = {$id}

         INNER JOIN role
                    ON ru.role_id = '{$data}'";
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row;
    }

//    public static function createRole($data)
//    {
//        try {
//            $conn = Config::connect();
//            if ($data['role'] == 'admin') {
//                $role_id = 1;
//            } else {
//                $role_id = 2;
//            }
//            $updaterole = "UPDATE role_user SET role_id = $role_id where user_id = '{$data['id']}'";
//          $conn->query($updaterole);
//            $sql = "INSERT INTO role_user( role_id, user_id) value ($role_id,'{$data['id']}')";
//            $conn->query($sql);
//        } catch (Exception $e) {
//            return $e;
//        }
//    }

    public static function getRole($data)
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM role WHERE `role_name` = '{$data}'";
        $conn->query($sql);
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row['id'];

    }

//    public static function updateRole($role_id, $user_id)
//    {
//
//    }

    public static function createRole($role_id, $user_id)
    {  $roleId = (int)$role_id;
        $userId=(int)$user_id;
        $conn = Config::connect();
        $sql = "INSERT INTO role_user(role_id, user_id) VALUES '{$roleId}', '{$userId}'";
        $conn->query($sql);
        var_dump($conn);
    }
}


