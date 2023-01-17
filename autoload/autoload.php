<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new HomeController();
$obj2 = new AdminController();
$obj3 = new User();
?>