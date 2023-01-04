<?php
session_start();
include 'database/config.php';
include 'database/usersdb.php';
$users = new User();
$userByid = $users->getById($_SESSION['id']);

echo "hello  " . $userByid['name'] . " your email  " . $userByid['email'] . "  <a href ='logout.php'>logout</a>";



