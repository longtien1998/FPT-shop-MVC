<?php

namespace src\models;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

use core\Database;

class usersModel
{
    private $email;
    private $ho;
    private $tenlot;
    private $ten;
    private $sdt;
    private $gioitinh;
    private $ngaysinh;
    private $matkhau;
    private $hinhanh;
    // get set
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setHo($ho)
    {
        $this->ho = $ho;
    }
    public function getHo()
    {
        return $this->ho;
    }
    public function setTenlot($tenlot)
    {
        $this->tenlot = $tenlot;
    }
    public function getTenlot()
    {
        return $this->tenlot;
    }
    public function setTen($ten)
    {
        $this->ten = $ten;
    }
    public function getTen()
    {
        return $this->ten;
    }
    public function setSdt($sdt)
    {
        $this->sdt = $sdt;
    }
    public function getSdt()
    {
        return $this->sdt;
    }
    public function setGioitinh($gioitinh)
    {
        $this->gioitinh = $gioitinh;
    }
    public function getGioitinh()
    {
        return $this->gioitinh;
    }
    public function setNgaysinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }
    public function getNgaysinh()
    {
        return $this->ngaysinh;
    }
    public function setMatkhau($matkhau)
    {
        $this->matkhau = $matkhau;
    }
    public function getMatkhau()
    {
        return $this->matkhau;
    }
    public function setHinhAnh($hinhanh)
    {
        $this->hinhanh = $hinhanh;
    }
    public function getHinhAnh()
    {
        return $this->matkhau;
    }
    public function __construct($email, $ho, $tenlot , $ten, $sdt, $gioitinh, $ngaysinh, $matkhau,$hinhanh)
    {
        $this-> email = $email;
        $this-> ho = $ho;
        $this-> tenlot= $tenlot;
        $this-> ten = $ten;
        $this-> sdt = $sdt;
        $this-> gioitinh = $gioitinh;
        $this-> ngaysinh = $ngaysinh;
        $this-> matkhau = $matkhau;
        $this->hinhanh = $hinhanh;
    }
    // GetAllStudent
    public static function getAllUser()
    {
        $db = new Database();
        return $db->pdo->query('select * from taikhoan')->fetchAll();
    }
    public static function getKhachHangByEmail($email){
        $db = new Database();
        $sql = 'SELECT * FROM taikhoan
                        JOIN khachhang ON taikhoan.Email = khachhang.Email
                        WHERE taikhoan.Email = "'.$email.'"
                        ';
        if($db->pdo->query($sql)->fetch()){
            return $db->pdo->query($sql)->fetch();
        } else {
            $sql = 'SELECT * FROM taikhoan
                        WHERE taikhoan.Email = "'.$email.'"
                        ';
            return $db->pdo->query($sql)->fetch();
        }
    }
    public static function getNhanVienAll(){
        $db = new Database();
        $sql = 'SELECT * FROM taikhoan
                        JOIN nhanvien ON taikhoan.Email = nhanvien.Email
                        JOIN calamviec on nhanvien.Maca = calamviec.Maca
                        ';
        if($db->pdo->query($sql)->fetchAll()){
            return $db->pdo->query($sql)->fetchAll();
        } else {
            return $db->pdo->query($sql)->fetch();
        }
    }
    public static function getAdminAll(){
        $db = new Database();
        $sql = 'SELECT * FROM taikhoan WHERE roles = 0';
        if($db->pdo->query($sql)->fetchAll()){
            return $db->pdo->query($sql)->fetchAll();
        } else {
            return $db->pdo->query($sql)->fetch();
        }
    }
    public static function getKhachHangAll(){
        $db = new Database();
        $sql = 'SELECT * FROM taikhoan
                        JOIN khachhang ON taikhoan.Email = khachhang.Email';
        if($db->pdo->query($sql)->fetchAll()){
            return $db->pdo->query($sql)->fetchAll();
        } else {
            return $db->pdo->query($sql)->fetch();
        }
    }
    public static function getNhanVienByEmail($email){
        $db = new Database();
        $sql = 'SELECT * FROM taikhoan
                        JOIN nhanvien ON taikhoan.Email = nhanvien.Email
                        WHERE taikhoan.Email = "'.$email.'"
                        ';
        if($db->pdo->query($sql)->fetch()){
            return $db->pdo->query($sql)->fetch();
        } else {
            $sql = 'SELECT * FROM taikhoan
                        WHERE taikhoan.Email = "'.$email.'"
                        ';
            return $db->pdo->query($sql)->fetch();
        }
    }
    public static function getUserbyemail($email)
    {
        $db = new Database();
        return $db->pdo->query("select * from taikhoan where email = '$email'")->fetch();
    }
    public static function delNhanVienByemail($email) : void
    {
        $db = new Database();
        $db->pdo->query("delete from nhanvien where email = '$email'")->execute();
        $db->pdo->query("delete from taikhoan where email = '$email'")->execute();
        
    }
    public static function setUserbyemail($email)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare('INSERT INTO taikhoan (email) VALUES (?)');
            try {
                return $stmt->execute($email->getemail()); // Trả về boolean
            } catch (\Exception $ex) {
                throw new \Exception("Create Fail!");
            }
    }
    public static function CreateKhachHang($user)
    {
        $db = new Database();
        $email = $user->getemail();
        $conn = $db->pdo->query("select * from taikhoan where email = '$email'")->fetch();
        if($conn != 0){
            return false;
        } else {
            $stmt = $db->pdo->prepare('INSERT INTO taikhoan VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $result = $db->pdo->prepare('INSERT INTO khachhang VALUES (?, ?, ?)');
            try {
               $data1 =  $stmt->execute([$user->getemail(),$user->getMatkhau(), $user->getSdt(), $user->getGioitinh(), $user->getNgaysinh(), $user->getHo(), $user->getTenlot(), $user->getTen(),"0" ]); // Trả về boolean
               $data2 =  $result->execute([2,0,$user->getemail()]);
               if($data1 && $data2){
                return true;
               } else {
                return false;
               }
            } catch (\Exception $ex) {
                throw new \Exception("Create Fail!");
            }
        }
       
    }
    public static function update($user)
    {
            
        $db = new Database();
        $stmt = $db->pdo->prepare('UPDATE taikhoan SET soDienThoai=?, gioiTinh=?, ngaySinh=?, ho=?, tenLot=?, ten=?  WHERE email=? ');
        try {
            return $stmt->execute([$user->getSdt(), $user->getGioitinh(), $user->getNgaysinh(), $user->getHo(), $user->getTenlot(), $user->getTen(), $user->getemail()]); // Trả về boolean
        } catch (\Exception $ex) {
            throw new \Exception("Update Fail!");
        }
       
    }

    public static function Updatepass($user)
    {   
        
        $db = new Database();
        $stmt = $db->pdo->prepare('UPDATE taikhoan SET matKhau=? WHERE email=? ');
        try {
            return $stmt->execute([$user->getMatkhau(), $user->getemail()]); // Trả về boolean
        } catch (\Exception $ex) {
            throw new \Exception("Update Fail!");
        }
    }
    public static function Delete($id)
    {
        $db = new Database();
        try {
            return $db->pdo->query("delete from students where Id = '$id'")->execute();
        } catch (\Exception $ex) {
            throw new \Exception("Delete Fail!");
        }
    }
    public static function updateHinhAnh($user){
        $db = new Database();
        $stmt = $db->pdo->prepare('UPDATE nhanvien SET HinhAnh=? WHERE email=? ');
        try {
            return $stmt->execute([$user->getHinhAnh(), $user->getemail()]); // Trả về boolean
        } catch (\Exception $ex) {
            throw new \Exception("Update Fail!");
        }
    }
}
