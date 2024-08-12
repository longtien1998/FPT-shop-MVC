<?php

namespace src\controllers;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
    // echo $class;
});

use src\models\productsModel;

class productsController extends baseController
{
    public function __construct()
    {
        $this->folder = 'products';
    }

    //hien thi sản phẩm
    public function index()
    {

        return $this->render('index'); 


    }
    public function ajax($key){
        //lay bien key truyen tu url
        // $key = isset($_POST["key"]) ? $_POST["key"] : "";

        if(productsModel::jajx($key)){
            $result = productsModel::jajx($key);
            $strResult = "";
            foreach($result as $rows)
                $strResult = $strResult."<li><img src=''><a href='index.php?product&{$rows['MaDanhMuc']}'>{$rows['TenSanPham']}</a></li>";
            echo $strResult;
        } else {
            echo "Không tìm thấy";
        }
       
    }

}