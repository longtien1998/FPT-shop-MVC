<?php

namespace src\models;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

use core\Database;

class testModel
{
    public static function getbyall(){
        $db = new Database();
        $sql = 'SELECT * FROM taikhoan
                        JOIN nhanvien ON taikhoan.Email = nhanvien.Email
                        JOIN khachhang ON taikhoan.Email = khachhang.Email
                        WHERE taikhoan.Email = "my@gmail.com"
                        ';
        return $db->pdo->query($sql)->fetch();
    }
    public static function test(){
        $email = $_POST["email"];
        return $email;
    }
}