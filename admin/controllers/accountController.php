<?php
namespace admin\controllers;

spl_autoload_register(function ($class) {
    require_once './' . $class . ".php";
});

use src\models\usersModel;

class accountController extends baseController
{
    public function __construct()
    {
        $this->folder = 'account';
    }
    public function index(){
        
    }

    public function login(){
        $this->render("login");
    }
    public function doLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $password = md5($password);
        $res = usersModel::getUserbyemail($email);
        if($res){
            if($res["roles"] == 1){
                
                if($res["matKhau"] == $password){
                    session_start();
                    $_SESSION['email-admin'] = $res['email'];
                    $_SESSION['user-admin'] = $res['tenLot'].' '.$res['ten'];
                    header("Location:index.php");
                } else {
                    // echo "<script>alert('Mật khẩu không đúng');</script>";
                    $this->render("login",["alert"=>"<script>alert('Mật khẩu không đúng');</script>"]);
                }
            } else {
                $this->render("login",["alert"=>"<script>alert('Tài khoản không tồn tại');</script>"]);
            }
        }else{
            $this->render("login",["alert"=>"<script>alert('Tài khoản không tồn tại');</script>"]);
        }
    
    }
    public function logout(){
        session_start();
        unset($_SESSION['email-admin']);
        unset($_SESSION['user-admin']);
        header("Location:index.php");
    }
    //nhan viên
    public function listNhanVien(){
        $data = usersModel::getNhanVienAll();
        if(usersModel::getNhanVienAll()){
            return $this->render('nhanvien',$data);
        } else{
            return $this->errer500();
        }
    }
    public function delNhanVien($email){
        usersModel::delNhanVienByemail($email);
        return $this->listNhanVien();
    }
    public function addnhanVien(){
        return $this->render('nhanvienadd');
    }


    //admin
    public function listAdmin(){
        $data = usersModel::getAdminAll();
        if(usersModel::getAdminAll()){
            return $this->render('admin',$data);
        } else{
            return $this->errer500();
        }
    }
    public function addAdmin(){
        return $this->render('addAdmin');
    }


    // khách hàng
    public function listKhachHang(){
        $data = usersModel::getKhachHangAll();
        if(usersModel::getKhachHangAll()){
            return $this->render('khachHang',$data);
        } else{
            return $this->errer500();
        }
    }

    // all taikhoan
    public function allaccount(){
        $data = usersModel::getAllUser();
        if(usersModel::getAllUser()){
            return $this->render('all',$data);
        } else{
            return $this->errer500();
        }
    }
}
?>