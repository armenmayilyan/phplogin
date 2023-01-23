<?php
session_start();

class UserLogin
{
    public $email;
    public $pass;
    public $checkbox;
    public $error = '';
    public $user;

    public function __construct($data)
    {
        $this->user = new User();
        $this->email = $data['email'];
        $this->pass = $data['password'];
        if ($data['checkbox'] == 'on') {
            $this->checkbox = $data['checkbox'];
        } else {
            $data['checkbox'] = null;
        }
    }

    public function loginValid()
    {

        $user = $this->user->getUser($this->email);
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