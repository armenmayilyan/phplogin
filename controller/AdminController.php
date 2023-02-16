<?php
include $_SERVER['DOCUMENT_ROOT'] . '/model/User.php';

use User as model;

class AdminController
{
    public static $error;

    public static function loginAdmin($data)
    {
        $model = User::class;
        $adminUser = $model::getWhere(['table' => 'users'], ['email' => $data['email']]);
        if (!is_null($adminUser)) {
            $checkAdmin = model::getRoles($adminUser['id']);

            if ($checkAdmin['email'] == $data['email'] && $data['password'] == password_verify($data['password'], $checkAdmin['password']) && $checkAdmin['role_name'] == 'admin') {
                $_SESSION['user_id']=$checkAdmin['user_id'];
                $_SESSION['admin'] = $checkAdmin['role_name'];
                $_SESSION['page'] = 'Admin Dashboard';

                $_SESSION['id'] = $checkAdmin['role_user_id'];
                $_SESSION['name'] = $checkAdmin['name'];
                header("location: adminDashbord.php");
            } else {
                return self::$error = 'your are not admin !';
            }
        }
    }

    public function createUser($data)
    {
        $checkUser = model::getWhere(['table' => 'users'], ['email' => $data['email']]);
        if (is_null($checkUser)) {
            $arr = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_BCRYPT)
            ];
            $usercreate = model::create(['table' => 'users'], $arr);
            if ($usercreate) {
                $getRole = model::getWhere(["table" => 'role'], ['role_name' => 'user']);
                $getUser = model::getWhere(['table' => 'users'], ['email' => $arr['email']]);
                $checkAdmin = model::getRoles($getUser['id']);
                if (is_null($checkAdmin)) {
                    model::create(['table' => 'role_user'], ['role_id' => $getRole['id'], 'user_id' => $getUser['id']]);
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

    public function update($data)
    {
        try {
            $dataupdate = [
                'name' => $data['name'],
                'email' => $data['email'],
                'id' => $data['id']
            ];
            $checkAdmin = model::getRoles((int)$data['id']);
            $getRole = model::getWhere(["table" => 'role'], ['role_name' => $data['role']]);
            if (!is_null($checkAdmin)) {
                $update = model::update(['table' => 'users'], $dataupdate);
                if ($update) {
                    model::update(['table' => 'role_user'], ['role_id' => $getRole['id'], 'user_id' => $dataupdate['id'], 'id' => $checkAdmin['role_user_id']]);
                } else {
                    model::create(['table' => 'role_user'], ['role_id' => $getRole['id'], 'user_id' => $dataupdate['id']]);
                }
            } else {
                model::update(['table' => 'users'], $dataupdate);
                model::create(['table' => 'role_user'], ['role_id' => $getRole['id'], 'user_id' => ((int)$data['id'])]);
            }
        } catch (Exception $e) {
            return $e;
        }

    }

    public function delete($data)
    {
        $id = (int)$data['deletebyID'];
        $checkRole = model::getRoles($id);
        if ($checkRole) {
            $delrole = model::delete(['table' => 'role_user'], ['user_id' => $id]);
            if ($delrole) {
                $deluser = model::delete(['table' => 'users'], ['id' => $id]);
                header("Refresh:0");
                return 'success';
            }
        } else {
            $deluser = model::delete(['table' => 'users'], ['id' => $id]);
            header("Refresh:0");
return 'success';
        }


    }


}