<?php 
namespace src\controllers;
include_once(realpath('') . '\\src\\models\\mailModel.php');
// include_once("./models/mailModel.php");
spl_autoload_register(function ($class) {
    require_once $class . ".php";
    echo $class;
});

use src\models\mailModel;
use src\models\usersModel;

class usersController extends baseController
{
    // public $messger ="";
    public static $codeadd = null;
   
    
    public function __construct()
    {
        
        $this->folder = "users";
    }
    public function index()
    {
        if(isset($_SESSION["email"])){
            $email = $_SESSION["email"];
            if(usersModel::getNhanVienByEmail($email)){
                $user = ['user' => usersModel::getNhanVienByEmail($email)];
            } else{
                $user = ['user' => usersModel::getKhachHangByEmail($email)];
            }
            // $user = ['user' => usersModel::getallByEmail($email)];
            // var_dump(usersModel::getKhachHangByEmail($email));
            // $user = usersModel::getUserbyemail($email);
            return $this->render("index",$user);
        } else {
            return false;
        }
        
    }
    
    public function login()
    {
        return $this->render("login");
    }
    public function register()
    {
        return $this->render("register");
    }
    public function forgotpass()
    {
        return $this->render("forgotpass");
    }
    public function randcode()
    {
        $code = rand(100000, 999999);
        return $code;
    }
    
    public function maregister()
    {
        if(isset($_POST['Email'])){
            $email = $_POST['Email'];
            // var_dump($datauser);
            if(usersModel::getUserbyemail($email)){
                $messger=['messfail' => '
                <div class="messfail d-flex" id="successMessage">
                    <i class="bx bx-x-circle"></i>
                    <p>Email đã được đăng ký, mời đăng nhập!</p>
                </div>'];
                return $this->render("login",$messger);
            } else {
                $code = $this->randcode();
                if(MailModel($email,$code)){
                    $_SESSION['macode']= $code;
                    $_SESSION['email'] = $email;
                    $messger=['messSuccess' => '
                <div class="messsucess d-flex" id="successMessage">
                    <i class="bx bx-check-circle"></i>
                    <p>Đã gửi mã về Email thành công</p>
                </div>',
            'code'=>'register'
            ];
                    return $this->render("nhapma",$messger);
                }
            }
        } else {
            $messger=['messfail' => '
                <div class="messfail d-flex" id="successMessage">
                    <i class="bx bx-x-circle"></i>
                    <p>Vui lòng nhập lại Email!</p>
                </div>'];
                return $this->render("login",$messger);   
        }
        

        
        
    }
    public function maaccept()
    {
        
            $code = $_POST['macode'];
            // $testcode = $this->getcode();
            if($code == $_SESSION['macode']){
                unset($_SESSION['macode']);
                $messger=['messSuccess' => '
                <div class="messsucess d-flex" id="successMessage">
                    <i class="bx bx-check-circle"></i>
                    <p>Đăng ký thành công</p>
                </div>',
                'code'=>'register'
            ];
                return $this->render("register",$messger);
            } else {
                $messger=['messfail' => '
                <div class="messfail d-flex" id="successMessage">
                    <i class="bx bx-x-circle"></i>
                    <p>Mã không khớp, mời nhập lại!</p>
                </div>',
                'code'=>'register'];
                return $this->render("nhapma",$messger);
            }
        
        
    }
    public function submitLogin()
    {   
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $password = md5($password);
        if(usersModel::getUserbyemail($email) == false){
            $messger=['messfail' => '
            <div class="messfail d-flex" id="successMessage">
                <i class="bx bx-x-circle"></i>
                <p>Email chưa được đăng ký!</p>
            </div>'];
            return $this->render("login",$messger);
        } else {
            $key = usersModel::getUserbyemail($email);
            // var_dump($key);
            // $checkmk = md5($key['maKhau']);
            if($password == $key['matKhau']){
                $_SESSION["username"] = $key['tenLot']." ".$key['ten'];
                $_SESSION["email"] = $key['email'];
                header("location:index.php");
            } else {
                $messger=['messfail' => '
                <div class="messfail d-flex" id="successMessage">
                    <i class="bx bx-x-circle"></i>
                    <p>Mật khẩu không đúng!</p>
                </div>'];
                return $this->render("login",$messger);
            }
            
        }

        // $_SESSION["username"] = "Anh Tiến";
        // header("location:index.php");
    }

    public function checkemail()
    {   
        $email = $_POST['email'];
        // $password = $_POST['password'];
        // $password = md5($password);
        if(usersModel::getUserbyemail($email) == false){
            $messger=['messfail' => '
            <div class="messfail d-flex" id="successMessage">
                <i class="bx bx-x-circle"></i>
                <p>Email chưa được đăng ký!</p>
            </div>'];
            return $this->render("forgotpass",$messger);
        } else {
            $code = $this->randcode();
            if(MailModel($email,$code)){
                $_SESSION['macode']= $code;
                $_SESSION['email'] = $email;
                $messger=['messSuccess' => '
            <div class="messsucess d-flex" id="successMessage">
                <i class="bx bx-check-circle"></i>
                <p>Đã gửi mã về Email thành công</p>
            </div>',
            'code'=>'forgot'];
                return $this->render("nhapma",$messger);
            }
            // return $this->render("newpass");
            // $password = $_POST['password'];
            // $password = md5($password);
            // $user = new usersModel($email,"","", "", "", "", "", $password);
            // if(usersModel::Updatepass($user)){
            //     $messger=['messSuccess' => '
            //     <div class="messsucess d-flex" id="successMessage">
            //         <i class="bx bx-check-circle"></i>
            //         <p>Cập nhập mật khẩu thành công</p>
            //     </div>'];
            //     return $this->render("login",$messger);
            //     // header("location:index.php");
            // } else {
            //     $messger=['messfail' => '
            //     <div class="messfail d-flex" id="successMessage">
            //         <i class="bx bx-x-circle"></i>
            //         <p>Cập nhập Mật khẩu thất bại!</p>
            //     </div>'];
            //     return $this->render("forgotpass",$messger);
            // }
            
        }

        // $_SESSION["username"] = "Anh Tiến";
        // header("location:index.php");
    }
    public function acceptmaforgot(){

            $code = $_POST['macodeforgot'];
            // $testcode = $this->getcode();
            if($code == $_SESSION['macode']){
                unset($_SESSION['macode']);
                $messger=['messSuccess' => '
                <div class="messsucess d-flex" id="successMessage">
                    <i class="bx bx-check-circle"></i>
                    <p>Xác nhận thành công</p>
                </div>'];
                return $this->render("newpass",$messger);
            } else {
                // echo $_SESSION['macode'];
                $messger=['messfail' => '
                <div class="messfail d-flex" id="successMessage">
                    <i class="bx bx-x-circle"></i>
                    <p>Mã không khớp, mời nhập lại!</p>
                </div> ',
                'code'=>'forgot'];
                return $this->render("nhapma",$messger);
            }
    }
    public function submitforgot(){
        $password = $_POST['password'];
        // $password = md5($password);
        $email =  $_SESSION["email"];
        $user = new usersModel($email,"","", "", "", "", "", $password, "");
        if(usersModel::Updatepass($user)){
            $messger=['messSuccess' => '
            <div class="messsucess d-flex" id="successMessage">
                <i class="bx bx-check-circle"></i>
                <p>Cập nhập mật khẩu thành công</p>
            </div>
            <script> window.history.pushState({}, "", "/index.php?userslogin");</script>'];
            unset( $_SESSION["email"]);
            return $this->render("login",$messger);
            // header("location:index.php");
        } else {
            $messger=['messfail' => '
            <div class="messfail d-flex" id="successMessage">
                <i class="bx bx-x-circle"></i>
                <p>Cập nhập Mật khẩu thất bại!</p>
            </div>'];
            return $this->render("forgotpass",$messger);
        }
    }
    public function setpass(){
        $password = $_POST['password'];
        // $password = md5($password);
        $email =  $_SESSION["email"];
        $user = new usersModel($email,"","", "", "", "", "", $password, "");
        if(usersModel::getNhanVienByEmail($email)){
            $datauser = usersModel::getNhanVienByEmail($email);
        } else{
            $datauser = usersModel::getKhachHangByEmail($email);
        }
        if(usersModel::Updatepass($user)){
            $messger=['messSuccess' => '
            <div class="messsucess d-flex" id="successMessage">
                <i class="bx bx-check-circle"></i>
                <p>Cập nhập mật khẩu thành công</p>
            </div>',
            'user'=>$datauser
        ];
            return $this->render("index",$messger);
        } else {
            $messger=['messfail' => '
            <div class="messfail d-flex" id="successMessage">
                <i class="bx bx-x-circle"></i>
                <p>Cập nhập Mật khẩu thất bại!</p>
            </div>',
            'user'=>$datauser
        ];
            return $this->render("index",$messger);
        }
    }

    public function logout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["emailchimh"]);
        header("location:index.php");
    }
    public function submitregister()
    {
        $email = $_SESSION['email'];
        $ho = $_POST['ho'];
        $tenlot = $_POST['tenlot'];
        $ten = $_POST['ten'];
        $sdt = $_POST['sdt'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $matkhau = $_POST['password'];
        // $matkhau = md5($matkhau);
        
        $user = new usersModel($email, $ho, $tenlot, $ten, $sdt, $gioitinh, $ngaysinh, $matkhau,"");
        if (usersModel::CreateKhachHang($user)) {
            unset($_SESSION['email']);
            $messger=['messSuccess' => '
            <div class="messsucess d-flex" id="successMessage">
                <i class="bx bx-check-circle"></i>
                <p>Đăng ký thành công</p>
            </div>'];
            return $this->render("login",$messger);
        } else {
            $messger=['messfail' => '
            <div class="messfail d-flex" id="successMessage">
                <i class="bx bx-x-circle"></i>
                <p>Đăng ký không thành công<br><span>Email đã được đăng ký</span></p>
            </div>'];
            return $this->render("register",$messger);
        }
        
    }

    public function updateuser(){
        $email = $_SESSION['email'];
        $ho = $_POST['ho'];
        $tenlot = $_POST['tenlot'];
        $ten = $_POST['ten'];
        $sdt = $_POST['sdt'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        // echo $email, $ho, $tenlot, $ten, $sdt, $gioitinh, $ngaysinh;
        $user = new usersModel($email, $ho, $tenlot, $ten, $sdt, $gioitinh, $ngaysinh, "","");
        if(usersModel::getNhanVienByEmail($email)){
            $datauser = usersModel::getNhanVienByEmail($email);
        } else{
            $datauser = usersModel::getKhachHangByEmail($email);
        }
        if (usersModel::update($user)) {
            $messger=[
                'messSuccess' => '
                            <div class="messsucess d-flex" id="successMessage">
                                <i class="bx bx-check-circle"></i>
                                <p>Chỉnh sửa thành công</p>
                            </div>',
                'user' => $datauser
                ];
            // array_push($messger,$datauser);
            return $this->render("index",$messger);
        } else {
            $messger=['messfail' => '
            <div class="messfail d-flex" id="successMessage">
                <i class="bx bx-x-circle"></i>
                <p>Chỉnh sửa không thành công</p>
            </div>',
            'user' => $datauser
        ];
            // array_push($messger,$datauser);
            return $this->render("index",$messger);
        }
    }
    // public function updateHinhAnh(){
        
    //     // lấy tên sap từ form
    //     $target_dir = "./assets/library/upload/";
    //     // đường dẫn đến thư mục file
    //     $target_file = $target_dir . basename($_FILES['filetoUpload']["name"]);

    //     //gán trạng thái upload file = 1 ( thành công)
    //     $uploadok = 1;
    //     // lấy định dạn ảnh
    //     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     // kiểm tra xem file đã  tồn tại chưa
    //     if (file_exists($target_file)) {
    //         $messger=['messfail' => '
    //         <div class="messfail d-flex" id="successMessage">
    //             <i class="bx bx-x-circle"></i>
    //             <p>Tải ảnh không thành công<br><span>Ảnh đã tồn tại</span></p>
    //         </div>'];
    //         $uploadok = 0;
    //         return $this->render("index",$messger);
    //         // bật trạng thái upload khi cài file lỗi
            
    //     }
    //     // kiểm tra kích thước file
    //     if ($_FILES["filetoUpload"]["size"] > 500000) {
            
    //         $uploadok = 0;
    //         $messger=['messfail' => '
    //         <div class="messfail d-flex" id="successMessage">
    //             <i class="bx bx-x-circle"></i>
    //             <p>Tải ảnh không thành công<br><span>Kích thước ảnh quá lớn</span></p>
    //         </div>'];
    //         return $this->render("index",$messger);
    //     }
    //     // kiểm tra định dạng file 
    //     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
    //         $uploadok = 0;
    //         $messger=['messfail' => '
    //         <div class="messfail d-flex" id="successMessage">
    //             <i class="bx bx-x-circle"></i>
    //             <p>Tải ảnh không thành công<br><span>Chỉ chấp nhận file JPG, JPEG, PNG, GIF, WEBP</span></p>
    //         </div>'];
    //         return $this->render("index",$messger);
    //     }
    //     // kiểm tra nếu $uploadok = 0, tức là có lỗi xãy ra
    //     if ($uploadok == 0) {
    //         $messger=['messfail' => '
    //         <div class="messfail d-flex" id="successMessage">
    //             <i class="bx bx-x-circle"></i>
    //             <p>Tải ảnh không thành công</p>
    //         </div>'];
    //         return $this->render("index",$messger);
    //     } else {
    //         // di chuyển file từ thư mục tạm lên thư mụ đích
    //         if (move_uploaded_file($_FILES["filetoUpload"]["tmp_name"], $target_file)) {
    //             // lấy địa chỉ ảnh sau khi đã upload thành công
    //             $path = $target_dir . basename($_FILES["filetoUpload"]["name"]);
    //             //chèn vào bảng product trong cơ sowe dữ liệu test
    //             // $conn = connect_db();
    //             // $query = "UPDATE nhanvien SET urlimage ='$path' WHERE tenDangNhap ='$user'";
                
    //             // $result = mysqli_query($conn, $query);
    //             // // kiểm tra kết quả try vấn
    //             // if ($result) {

    //             //     $message5 = '<h2 class="section-title px-5"><span class="px-2" style="color: green;">Thêm ảnh thành công</span></h2>';
    //             //     header('refresh:2;index.php?action=usernv');
    //             // } else {
    //             //     $message6 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Có lỗi xảy ra</span></h2><br>';
    //             // }

    //             $email = $_SESSION['email'];
    //             $user = new usersModel($email,"", "", "", "", "", "", "",$path);
    //             if (usersModel::updateHinhAnh($user)) {
    //                 $messger=['messSuccess' => '
    //                 <div class="messsucess d-flex" id="successMessage">
    //                     <i class="bx bx-check-circle"></i>
    //                     <p>Tải ảnh thành công</p>
    //                 </div>'];
    //                 return $this->render("index",$messger);
    //             } else {
    //                 $messger=['messfail' => '
    //                 <div class="messfail d-flex" id="successMessage">
    //                     <i class="bx bx-x-circle"></i>
    //                     <p>Tải ảnh thất bại</p>
    //                 </div>'];
    //                 return $this->render("index",$messger);
    //             }
    //         } else {
    //             $messger=['messfail' => '
    //                 <div class="messfail d-flex" id="successMessage">
    //                     <i class="bx bx-x-circle"></i>
    //                     <p>có lỗi xãy ra khi tải lên file</p>
    //                 </div>'];
    //                 return $this->render("index",$messger);
    //         }
    //     }
        
    // }

    
}


?>