<?php

include '../model/user.php';

session_start();

use UserDto as userDto;
use User as user;
use UserLogin;

class HomeController
{

    public static function create($data)
    {
        $userDto = new userDto($data);
        $valid = $userDto->createValid();
        if ($valid == 'success') {
            header("location: login.php");
        } else {
            return $valid;
        }

    }

    public static function login($data)
    {
        $userLogin = new UserLogin($data);
        $loginValid = $userLogin->loginValid();
        if ($loginValid) {
            header("location: index.php");
        }


    }
}