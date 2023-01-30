<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
include $_SERVER['DOCUMENT_ROOT'] . '/controller/UserDto.php';
use Config\controller\UserDto as userDto;

class HomeController
{
    public static $error;

    public static function create($data)
    {
        $userDto = new userDto($data);
        $valid = $userDto->registerValid();
        if ($valid == 'success') {
            $_SESSION['page'] = 'Login';
            header("location: login.php");
        } else {
            self::$error = $userDto->errors;
        }
    }

    public static function login($data)
    {
        $userLogin = new userDto($data);
        $loginValid = $userLogin->loginValid();
        if (!is_null($loginValid)) {
            $_SESSION['page'] = 'Home';
            header("location: index.php");
        }
            var_dump(self::$error = $userLogin->errors);

    }

}