<?php

namespace traits;
include $_SERVER['DOCUMENT_ROOT'] . '/Config.php';

use Config\Config;

trait adminQueryable
{
    public static function getAllUsers()
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users";
        $results = $conn->query($sql);
        return $results;

    }

    public static function getWhere($data)
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users WHERE email = '{$data['email']}'";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        return $row;
    }

    public static function roles()
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM role_user INNER JOIN role ON role_id = role_user.role_id INNER JOIN users ON users.id = role_user.user_id";
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row;
    }

    public static function create($data){
        $conn = Config::connect();
        $sql = "CREATE TABLE users(name,email, pasword) value ('{$data['name']}','{$data['email']}',{$data['password']})";
        $conn->query($sql);
        return 'success';
    }

}