<?php

namespace src\controllers;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
    // echo $class;
});

use src\models\cartModel;

class cartController extends baseController
{
    public function __construct()
    {
        $this->folder = 'cart';
        //neu gio hang chua ton tai thi khoi tao no
        if (isset($_SESSION["cart"]) == false)
            $_SESSION["cart"] = array();

    }

    //hien thi gio hang
    public function index()
    {

        return $this->render('index');
        // $_SESSION["cart"] = array();


        // session_start();     


    }
    public function new()
    {

    }
    //them san pham vao gio hang
    public function create($id)
    {
        //goi ham cartAdd de them san pham vao gio hang
        $result = cartModel::cartAdd($id);
        if($result){
            $messger=['messSuccess' =>"
            <div class='messsucess d-flex' id='successMessage'>
                <i class='bx bx-check-circle'></i>
                <p>Thêm vào giỏ hàng thành công</p>
            </div>
            <script> window.history.pushState({}, '', '/index.php?cart');</script>"];
            // echo '<script>showSuccessMessage();</script>';
        } else {
            $messger = [];
        }
        // //quay tro lai trang gio hang
        
       
        $this->render('index', $messger);
        // // header("location:index.php?cart");
        // echo "<script>alert('hihi ".$id."')";
    }


    //xoa san pham khoi gio hang
    public function delete($id)
    {
        //goi ham cartDelete de xóa san pham gio hang
       if(cartModel::cartDelete($id)){
        $messger=['messSuccess' => "
        <div class='messsucess d-flex' id='successMessage'>
            <i class='bx bx-check-circle'></i>
            <p>Thêm vào giỏ hàng thành công</p>
        </div>
        <script> window.history.pushState({}, '', '/index.php?cart');</script>"];
        
       } else {
        $messger = [];
       }
       $this->render('index', $messger);
        //quay tro lai trang gio hang
        // header("location:index.php?cart");
    }
    // //xoa toan bo gio hang
    public function destroy()
    {
        //goi ham cartDestroy de xoa all gio hang
        cartModel::cartDestroy();
        $messger=['messSuccess' => '
            <div class="messsucess d-flex" id="successMessage">
                <i class="bx bx-check-circle"></i>
                <p>Xóa tất cả giỏ hàng thành công</p>
            </div>
            <script> window.history.pushState({}, "", "/index.php?cart");</script>'
            
        ];
        return $this->render('index',$messger);
    
        //quay tro lai trang gio hang

    }


    //cap nhat nhieu san pham
    public function update()
    {
        
        //duyet cac phan tu trong session array
        foreach ($_SESSION["cart"] as $product) {
            $id = $product["id"];
            $quantity = $_POST["product_$id"];
            // var_dump($quantity);
            //goi ham cartUpdate de update lai so luong
            if($quantity != $_SESSION['cart'][$id]['number']){
                cartModel::cartUpdate($id, $quantity);
                $messger=['messSuccess' => '
        <div class="messsucess d-flex" id="successMessage">
            <i class="bx bx-check-circle"></i>
            <p>Cập nhập giỏ hàng thành công</p>
        </div>
        <script> window.history.pushState({}, "", "/index.php?cart");</script>'];
            } else{
                $messger=['messSuccess'=>'<script> window.history.pushState({}, "", "/index.php?cart");</script>'];
            }
        }
       
        
        //quay tro lai trang gio hang
        return $this->render('index',$messger);
        // header("location:index.php?controller=cart");
    }
    //thanh toan gio hang

   public function checkout()
    {
        //kiem tra neu user chua dang nhap thi di chuyen den trang dang nhap
        if (isset($_SESSION["customer_email"]) == false)
            header("location:index.php?controller=account&action=login");
        else {
            //goi ham cartCheckOut de thanh toan gio hang
            // $id = $this->cartCheckOut();
            // header("location:index.php?controller=checkout&id=$id");
        }
    }
}