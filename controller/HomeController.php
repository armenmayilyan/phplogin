<?php

include '../model/user.php';

session_start();

use UserDto as userDto;
use User as user;
use UserLogin;

class HomeController
{

    public static function register($data)
    {
        $userDto = new userDto($data);
        $valid = $userDto->registerValid();
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