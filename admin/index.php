<?php
spl_autoload_register(function ($class) {
    require '../' . $class . ".php";
});

use core\Route;
use admin\controllers\dashboardController;
use admin\controllers\accountController;

use admin\controllers\studentController;

$router = new Route();
// Đăng ký route
$router
    // home
    ->get('dashboard', [dashboardController::class, 'index'])
    // login
    ->get('login', [accountController::class, 'login'])
    ->post('login', [accountController::class, 'dologin'])
    //logout
    ->get('logout', [accountController::class, 'logout'])

    //account
    ->get('account', [accountController::class, 'allaccount'])
    //nhanvien
    ->get('accountNhanvien', [accountController::class, 'listNhanVien'])
    ->get('accountNhanvienadd', [accountController::class, 'addNhanVien'])
    ->get('accountNhanviendel', [accountController::class, 'delNhanVien'])
    ->get('accountNhanvienupdate', [accountController::class, 'updateNhanVien'])
    ->get('accountNhanvieninfo', [accountController::class, 'infoNhanvien'])
    //admin
    ->get('accountAdmin', [accountController::class, 'listAdmin'])
    ->get('accountAdminadd', [accountController::class, 'addAdmin'])


    //khach hang
    ->get('accountKhachHang', [accountController::class, 'listKhachHang'])


    ->get('students', [studentController::class, 'index'])
    ->get('studentCreate', [studentController::class, 'create'])
    ->post('studentCreate', [studentController::class, 'insert'])
    ->get('studentUpdate', [studentController::class, 'update'])
    ->post('studentUpdate', [studentController::class, 'modify'])
    ->get('studentDelete', [studentController::class, 'delete']);
// Xử lý route
$router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD'])); // $_SERVER['REQUEST_METHOD'] trả về tên method in hoa
