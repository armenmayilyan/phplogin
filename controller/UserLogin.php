<?php

use User as user;

class UserLogin
{
    public $email;
    public $pass;
    public $checkbox;
    public $error = '';

    public function __construct($data)
    {
        $this->email = $data['email'];
        $this->pass = $data['password'];
        if($data['checkbox']){
            $this->checkbox=$data[$this->checkbox];
        }else{
            $data['checkbox'] = null;
        }
    }

    public function loginValid()
    {
        $user = user::getUser($this->email);
        var_dump($user);
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