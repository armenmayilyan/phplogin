<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';

use User as model;

class AdminController
{
    public static $error;

    public static function loginAdmin($data)
    {
        $model = User::class;
        $adminUser = $model::getWhere(['email' => $data['email']]);
        if (!is_null($adminUser)) {
            $checkAdmin = model::getRoles($adminUser['id']);
            if ($checkAdmin['email'] == $data['email'] && $data['password'] == password_verify($data['password'], $checkAdmin['password']) && $checkAdmin['role_name'] == 'admin') {
                $_SESSION['admin'] = $checkAdmin['role_name'];
                $_SESSION['page'] = 'Admin Dashboard';
                $_SESSION['id'] = $checkAdmin['id'];
                $_SESSION['name'] = $checkAdmin['name'];
                header("location: adminDashbord.php");
            } else {
                return self::$error = 'your are not admin !';
            }
        }
    }

    public function createUser($data)
    {
        $checkUser = model::getWhere(['email' => $data['email']]);
        if (is_null($checkUser)) {
            $arr = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_BCRYPT)
            ];
            model::create($arr);
        }
    }

    public function getUser()
    {
        $users = model::getAllUsers();
        if (!is_null($users)) {
            return $users;
        }

    }

    public function update($data)
    {
        $id = (int)$data['id'];
        $checkUser = model::getWhere(['email' => $data['email']]);
        if (!is_null($checkUser)) {
            $update = model::update($data);
            var_dump($update);
        }
    }
}