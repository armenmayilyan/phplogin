<?php
namespace view;
session_start();
    session_destroy();
    header("location: login.php");
