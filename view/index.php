<?php
include '../autoload.php';
require "./header/header.php";
require '../model/User.php';
if ($_SESSION == null) {
    header("location: login.php");
} else {
    $user = new User();
    $row = $user->getById($_SESSION['id']);
    echo 'hello ' . '  ' . $row['name'];

}
include "./footer/footer.php";





