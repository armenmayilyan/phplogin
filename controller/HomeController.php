<?php
namespace controller;
include $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';
include $_SERVER['DOCUMENT_ROOT'] . '/controller/UserLogin.php';
class HomeController
{

    public static function create($data)
    {
        $user = new User();
        try {
            if (strlen($data['name']) < 2 || strlen($data['name']) > 12) {
                echo 'please write correct name!';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                echo 'please write correct email!';
            } elseif (strlen($data['password']) < 6) {
                echo 'please write correct password or confirm password!';
            } elseif ($data['password'] != $data['confirmPassword']) {
                echo 'please write correct password or confirm password!';
            } else {
                $arr = [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => password_hash($data['password'], PASSWORD_BCRYPT)
                ];

                $emailCheck = $user->getByEmail($arr['email']);

                if ($emailCheck != null) {
                    echo 'User in register';
                } else {
                    $user->create($arr);
                    header("location: login.php");
                }

            }
        } catch (Exception $e) {
            return $e;
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