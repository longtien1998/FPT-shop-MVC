<?php

namespace src\models;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

use core\Database;

class productsModel
{
    
    // private $Id;
    public function __construct()
    {
        // $this->Id = $id;
    }
    public static function jajx($key){
        $db = new Database();
        // $sql = ;
        try {
            return $db->pdo->query("select * from sanpham where TenSanPham like '%".$key."%'")->fetchAll();
        } catch (\Throwable $throwable) {
            throw new \Exception("Create Fail!");
        }
        
    }
}
