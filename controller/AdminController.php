<?php
include '../model/user.php';
session_start();

use User as user;

class AdminController
{
    public static function adminLogin($data)
    {
        $checkEmail = user::getByEmail($data['email']);
        if ($checkEmail) {
            $user = user::getUser($checkEmail);
            if ($user) {
                $getRole = user::roles($user['id']);
                if ($getRole) {
                    var_dump($data['email'] == $getRole['email'] && $data['password'] == password_verify($data['password'], $getRole['password']));
                    if ($data['email'] == $getRole['email'] && password_verify($data['password'], $getRole['password']) && $getRole['role_name'] == 'admin') {
                        $_SESSION['admin_auth'] = $getRole['id'];
                        header("location: admindashbord.php");
                    }
                } else {
                    echo 'you are not an admin!';
                }

            }
        }

    }

    public static function update($data)
    {
        if ($data['role'] != null) {
            $roleId = user::getRole($data['role']);
            $user = user::roles($roleId,$data['id']);
            if($user){
                $updateUser = user::updateUser($data);
                user::createRole($roleId,$data['id']);
                if($updateUser){
                   var_dump($updateUser);
                }
            }

        }
//        if($roleId){
//
//        }else{
//            var_dump($roleId);
//            $create = user::createRole($roleId, $data['id']);
//            var_dump($create);
//
//        }

    }
}