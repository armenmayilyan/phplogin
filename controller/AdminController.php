<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/model/admin.php';

use admin as model;
class AdminController
{
    public function loginAdmin($data)
    {
        $adminUser = model::getWhere(['email' => $data['email']]);
        if (!is_null($adminUser)) {
            $checkAdmin = model::roles();
            var_dump($checkAdmin);
            if ($checkAdmin['email'] == $data['email'] && $data['password'] == password_verify($data['password'], $checkAdmin['password']) && $checkAdmin['role_name'] == 'admin') {
                $_SESSION['admin'] = $checkAdmin['role_name'];
                $_SESSION['id'] = $checkAdmin['id'];
                $_SESSION['name'] = $checkAdmin['name'];
                header("location: adminDashbord.php");
            } else {
                echo 'err';
            }
        }
    }

    public function createUser($data){
      $checkUser = model::getWhere(['email'=>$data['email']]);
      if(is_null($checkUser)){
          $create = model::create($data);
          if($create == 'success'){
              if($data['role']=='admin'){
                  var_dump(123);
              }
          }
      }
    }

    public function getUser()
    {
        $users = model::getAllUsers();
        if (!is_null($users)) {
            return $users;
        }

    }
}