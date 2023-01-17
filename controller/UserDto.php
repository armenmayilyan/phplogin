<?php

use User as user;

class UserDto
{

    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public $error = '';

    /**
     * @param $name
     * @param $email
     * @param $password
     * @param $confirmPassword
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->confirmPassword = $data['confirmPassword'];
    }

    /**
     * @return void
     */

    public function createValid()
    {
        $user = User::class;
        try {
            if (strlen($this->name) < 2 || strlen($this->name) > 12) {
                return $this->error = 'please write correct name!';
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return $this->error = 'please write correct email!';
            } elseif (strlen($this->password) < 6) {
                return $this->error = 'please write correct password or confirm password!';
            } elseif ($this->password != $this->confirmPassword) {
                return $this->error = 'please write correct password or confirm password!';
            } else {
                $arr = [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => password_hash($this->password, PASSWORD_BCRYPT)
                ];
                $getEmail = $user::getByEmail($arr['email']);
                if ($getEmail) {
                    return $this->error = 'user is register';
                } else {
                    $user::create($arr);
                    return "success";
                }

            }
        } catch (Exception $e) {
            return $e;
        }
    }



}