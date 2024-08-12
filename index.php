<?php
spl_autoload_register(function ($class) {
    require $class . ".php";
    
    // echo $class;
});

use core\Route;
use src\controllers\homeController;
use src\controllers\studentController;
use src\controllers\cartController;
use src\controllers\productsController;
use src\controllers\testController;
use src\controllers\usersController;


// Khởi tạo đối tượng route
$router = new Route();
// Đăng ký route
$router
    // home
    ->get('home', [homeController::class, 'index'])

    // tìm kiếm
    ->get('search', [productsController::class, 'ajax'])

    // users
    ->get('users', [usersController::class, 'index'])
    ->get('userslogin', [usersController::class, 'login'])
    ->post('submitlogin', [usersController::class, 'submitLogin'])
    //đăng ký
    ->get('usersregister', [usersController::class, 'register'])
    ->post('submitmaregister', [usersController::class, 'maregister'])
    ->post('submitcoderegister', [usersController::class, 'maaccept'])
    ->post('submitregister', [usersController::class, 'submitregister'])
    // quên pass
    ->get('usersforgot', [usersController::class, 'forgotpass'])
    ->post('checkemail', [usersController::class, 'checkemail'])
    ->post('submitcodeforgot', [usersController::class, 'acceptmaforgot'])
    ->post('submitforgot', [usersController::class, 'submitforgot'])
    //đổi pas
    ->post('setpass', [usersController::class, 'setpass'])
    // update user
    ->post('updateuser', [usersController::class, 'updateuser'])
    //upload ảnh
    ->post('filetoUpload', [usersController::class, 'updateHinhAnh'])
    // đăng suất
    ->get('userslogout', [usersController::class, 'logout'])

    
    // cart
    ->get('cart', [cartController::class, 'index'])
    // xóa all cart
    ->get('cartdestroy', [cartController::class, 'destroy'])
    // create sp vào cart
    ->get('cartcreate', [cartController::class, 'create'])
    // xóa từng sản phẩm trong giỏ hàng
    ->get('cartdelete', [cartController::class, 'delete'])
    //update giỏ hàng
    ->post('cartupdate', [cartController::class, 'update'])
    //test
    ->get('test', [testController::class, 'test'])
;
// Xử lý route
$router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD'])); // $_SERVER['REQUEST_METHOD'] trả về tên method in hoa
