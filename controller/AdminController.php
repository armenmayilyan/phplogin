<?php
include '../model/user.php';
session_start();
use User as user;

class AdminController
{
    public static function adminLogin($data)
    {
        var_dump($data);
        $user = user::getByEmail($data['email']);
        if ($user) {
            $asd = user::getUser($user);
            if ($asd) {
               $arr = user::pivote();
               if($arr){
                   if($data['email'] == $arr['email'] && password_verify($data['password'],$arr['password']) && $arr['role_name']=='admin'){
                       $_SESSION['auth_admin'] = true;
                       var_dump($_SESSION);
                       header("location: admindashbord.php");
                   }
               }

            }
        }
//       $user::getUser($user);
//       var_dump($user);
    }
}