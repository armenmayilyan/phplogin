<?php
include $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
include $_SERVER['DOCUMENT_ROOT'] . '/controller/UserDto.php';
use UserDto;
class HomeController
{
    public static $error;

    public static function create($data)
    {
        $userDto = new userDto($data);
        $valid = $userDto->registerValid();
        if ($valid == 'success') {
            header("location: login.php");
        } else {
          return self::$error;
        }
    }

    public static function login($data)
    {
        $userLogin = new userDto($data);
        $loginValid = $userLogin->loginValid();
        if (!is_null($loginValid)) {
            header("location: index.php");
        }
           return self::$error = $userLogin->errors;

    }

}