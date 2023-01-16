<?php
require "./header/header.php";
require '../model/user.php';

session_start();
use user as user;

$user = user::getById($_SESSION['id']);
echo 'hello '.'  ' .$user['name'];

include "./footer/footer.php";
?>




