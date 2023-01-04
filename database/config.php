<?php

class Dbh
{
    public function connect()
    {
        $conn = new mysqli("172.17.0.3", 'root', '123456', 'blog', '3306','mariadb');
        return $conn;
    }
}

