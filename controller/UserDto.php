<?php

use User as model;

class UserDto
{
    public $userDetails;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->userDetails = $data;
    }

    /**
     * @return void
     */

    public function registerValid()
    {

        $user = model::class;
        try {
            if (strlen($this->userDetails['name']) < 2 || strlen($this->userDetails['name']) > 12) {
                echo 'please write correct name!';
            } elseif (!filter_var($this->userDetails['email'], FILTER_VALIDATE_EMAIL)) {
                echo 'please write correct email!';
            } elseif (strlen($this->userDetails['password']) < 6) {
                echo 'please write correct password or confirm password!';
            } elseif ($this->userDetails['password'] != $this->userDetails['confirmPassword']) {
                echo 'please write correct password or confirm password!';
            } else {
                $arr = [
                    'name' => $this->userDetails['name'],
                    'email' => $this->userDetails['email'],
                    'password' => password_hash($this->userDetails['password'], PASSWORD_BCRYPT)
                ];

                $getEmail = $user::getWhere(['email' => $arr['email']]);
                if ($getEmail) {
                    echo 'user is register';
                    return 'user is register';
                } else {
                    $user::create($arr);
                    return "success";
                }

            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public function loginValid()
    {
        $user = user::getUser($this->email);
        var_dump($user,123);
        if ($user) {
            if ($this->checkbox) {
                setcookie('login', $this->email, time() + 60 * 60 * 24 * 30);
                setcookie('password', $this->pass, time() + 60 * 60 * 24 * 30);
            } elseif ($this->email != $user['email'] && $this->pass != password_verify($this->pass, $user['password'])) {
                return $this->error = 'please write correct login or password';
            }
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            return true;

        }
    }



}