<?php
class Admin {
    public static function getAllUsers()
    {
var_dump(123);
die();
        $conn = Config::connect();
        $sql = "SELECT * FROM users";
        $results = $conn->query($sql);
        $results->fetch_assoc();
        return $results;


    }
}