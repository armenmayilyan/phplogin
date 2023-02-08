<?php

namespace traits;
include $_SERVER['DOCUMENT_ROOT'] . '/Config.php';

use Config\Config;

trait Queryable

{
    public static function create($table, $data)
    {
        $columns = array_keys($data);
        $values = array_values($data);
        $colnames = implode("`, `", $columns);
        $colvals = implode("', '", $values);
        $conn = Config::connect();
        $sql = <<<SQL
 INSERT INTO {$table['table']}(`$colnames`)   
VALUES ('$colvals')
SQL;
        $result = $conn->query($sql);
        return $result;
    }

    public static function getRoles($userId)
    {
        $conn = Config::connect();
        $sql = "SELECT role_user.id as role_user_id, users.id as user_id, users.email, users.password, role_name, role_user.role_id as role_id
                from users
                inner join role_user on role_user.user_id = users.id
                inner join role r on role_user.role_id = r.id where role_user.user_id = $userId";
        $results = $conn->query($sql);
        $row = $results->fetch_assoc();
        return $row;
    }

    public static function getAllUsers()
    {
        $conn = Config::connect();
        $sql = "SELECT * FROM users";
        $results = $conn->query($sql);
        $results->fetch_assoc();
        return $results;
    }

    public static function getWhere($table, $data)
    {
        $conn = Config::connect();
        $where = '';
        $index = 0;
        foreach ($data as $column => $value) {
            if ($index < 1) {
                $where .= "WHERE `$column` = '{$value}'";
            } else {
                $where .= "OR `$column` = '{$value}'";
            }
            $index++;
        }
        $sql = "SELECT * FROM {$table['table']} $where";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public static function update($table, $data)
    {
        $conn = Config::connect();
        $set = '';
        $where = '';
        $index = 0;
        foreach ($data as $column => $value) {
            if ($index < 1) {
                $set .= "`$column` = '{$value}',";
            } elseif ($index < 2) {
                $set .= "`$column` = '{$value}'";
            } else {
                $where .= " `$column` = '{$value}'";
            }
            $index++;
        }
        $sql = "UPDATE {$table['table']} SET $set WHERE $where";
        $res = $conn->query($sql);
        return $res;
    }

    public static function delete($table, $data)
    {

        $columns = array_keys($data);
        $values = array_values($data);
        $colnames = implode("`, `", $columns);
        $colvals = implode("', '", $values);
        $conn = Config::connect();
        $sql = "DELETE FROM {$table['table']}  WHERE `$colnames` = $colvals";
        $res = $conn->query($sql);
        return $res;
    }
}
