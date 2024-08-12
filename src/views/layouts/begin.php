<?php
spl_autoload_register(function ($class) {
    require_once $class . ".php";
    session_start();
    
});

use core\Field;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->


    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/user.css">



    <!-- link favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/public/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/public/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/public/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="./assets/public/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="./assets/public/favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- link bootstrap -->
    <link rel="stylesheet" href="./assets/public/bootstrap-4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->

    <!-- link icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/db4ae7b83e.js" crossorigin="anonymous"></script>
    
    <!-- link thư viện js -->
    <link rel="stylesheet" href="./assets/public/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/public/lib/owlcarousel/assets/owl.theme.default.min.css">
    
    <script src="./assets/public/lib/jquery.min.js"></script>
    <script src="<?php // echo  str_contains($_SERVER['REQUEST_URI'], "?") ? "" : "./assets/public/lib/owlcarousel/owl.carousel.min.js" ; ?>"></script>
    <script src="./assets/public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/assets/js/ajax-cart221b.js"></script>


</head>

<body class="body">
    <?php
    include(realpath('') . '\\src\\views\\layouts\\header.php');
    include(realpath('') . '\\src\\views\\layouts\\nav.php');
    ?>
