<?php
include '../model/db.php';
session_start();

use UserDto;
use user;

class homeController
{
    public static function register($data)
    {
        $user = user::class;
        $userDto = new UserDto($data);
        $valid = $userDto->registerValid();
        if($valid['email']){
            $getEmail = $user::getByEmail($valid['email']);
            if($getEmail){
                return $userDto->error = 'user is register';
            }else{
                $user::create($valid);
                header("location: login.php");
            }
        }

    }

    public static function login($data)
    {
        $user = user::getUser($data['email']);
        if ($data['email'] != $user['email'] || $data['email'] == null) {
            echo 'error email';
        } elseif (password_verify($data['password'], $user['password']) != $data['password']) {
            echo "error password";
        } else {
            $_SESSION['id'] = $user['id'];
            header("location: index.php");
        }
    }
}