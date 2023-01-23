<?php
include include $_SERVER['DOCUMENT_ROOT'] . '/model/traits/Queriable.php';
class Admin
{
    protected static $table = 'role_user';
    use \traits\Queriable;
}