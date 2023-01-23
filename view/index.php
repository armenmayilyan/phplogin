<?php
require "./header/header.php";
require '../model/user.php';
session_start();
use user as user;
if($_SESSION == null){
    header("location login.php");
}else{
    $user = user::getWhere($_SESSION['id']);
    echo 'hello '.'  ' .$user['name'];
}


include "./footer/footer.php";





