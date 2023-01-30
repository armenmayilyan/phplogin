<?php

namespace Config\controller;

use User as model;

class UserDto
{
    public $userDetails;
    public $errors = [];

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
        $model = model::class;
        try {
            if (!filter_var($this->userDetails['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'please write correct email!';
            } elseif (strlen($this->userDetails['name']) < 2 || strlen($this->userDetails['name']) > 12) {
                $this->errors['name'] = 'please write correct name!';
            } elseif (strlen($this->userDetails['password']) < 2) {
                $this->errors['password'] = 'please write correct password or confirm password!';
            } elseif ($this->userDetails['password'] != $this->userDetails['confirmPassword']) {
                $this->errors['password'] = 'please write correct password or confirm password!';
            } elseif (!is_null($this->errors)) {
                return $this->errors;

            } else {
                $arr = [
                    'name' => $this->userDetails['name'],
                    'email' => $this->userDetails['email'],
                    'password' => password_hash($this->userDetails['password'], PASSWORD_BCRYPT)
                ];
                $getEmail = $model::getWhere(['email'=>$arr['email']]);

                if ($getEmail['email']) {
                   $this->errors['email'] = 'this' . $arr['email'] . ' user in register';
                } else {
                    $model::create($arr);
                    return "success";
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function loginValid()
    {
        $user = model::getWhere(['email' => $this->userDetails['email']]);
        if ($user) {
            if ($this->userDetails['checkbox'] != null) {
                setcookie('login', $this->userDetails['email'], time() + 60 * 60 * 24 * 30);
                setcookie('password', $this->userDetails['password'], time() + 60 * 60 * 24 * 30);
            } elseif ($this->userDetails['email'] != $user['email'] && $this->userDetails['password'] != password_verify($this->userDetails['password'], $user['password'])) {
                $this->errors = 'please write correct login or password';
            }
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            return $user;
        } else {
            $this->errors = 'please write correct login or password';
        }
    }


}