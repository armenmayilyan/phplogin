<?php
namespace view;
require "./header/header.php";
include '../controller/HomeController.php';

if($_SESSION['id'] != null){
    echo 'hello'. " ". $_SESSION['name'];
}else{
    header("location: login.php");
}

include "./footer/footer.php";





