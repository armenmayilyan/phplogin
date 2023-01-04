<?php
session_start();

class User extends Dbh
{
    public $errors = '';

    public function registerUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if (strlen($name) < 2 || strlen($name) > 12) {
            $this->errors = "Invalid name format";
        } elseif (strlen($email) < 10 || strlen($email) > 90) {
            $this->errors = 'Invalid email format';
        } elseif (strlen($password) < 6 || strlen($password) > 30) {
            $this->errors = 'Invalid password format';
        } elseif ($password != $confirm_password) {
            $this->errors = 'Invalid password format';

        } else {
            $select = "SELECT * FROM users where email = '$email'";
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $result = $this->connect()->query($select);
            $datas = $result->fetch_assoc();
            if ($datas) {
                $this->errors = 'tis user in register';
            } else {
                $insertUser = "INSERT INTO users (`name`,`email`,`password`)
                    VALUES ('$name', '$email',  '$hash' )";
                $this->connect()->query($insertUser);
                header('location: login.php');
            }
        }

    }
    public function getById($id){
        $select = "SELECT * FROM users where id = '$id'";
        $result = $this->connect()->query($select);
        mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $select = "SELECT * FROM users where email = '$email'";
        $result = $this->connect()->query($select);
        $numRows = mysqli_num_rows($result);
        if ($numRows == 1) {
            $row = $result->fetch_assoc();
            $verify = password_verify($password, $row['password']);
            if ($verify) {
                if (isset($_POST['checkbox'])) {
                   $login = $row['email'];
                    setcookie('login', $login, time() + 2678400);
                    setcookie('password', $_POST['password'], time() + 2678400);
                }
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                header('location: index.php');
            } else {
                header('location: login.php');
            }
        }


    }
    public function logout(){
       $user = $this->getById($_SESSION['id']);
       var_dump($user);
        if($user){
            session_destroy();
            header('location: login.php');
        }
    }
}
