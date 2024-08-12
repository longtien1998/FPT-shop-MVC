<?php //session_start();  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>

     <!-- link bootstrap -->
     <link rel="stylesheet" href="../assets/public/bootstrap-4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->
    <!-- link thư viện js -->
    <link rel="stylesheet" href="../assets/public/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/public/lib/owlcarousel/assets/owl.theme.default.min.css">

    <script src="../assets/public/lib/jquery.min.js"></script>
    <script src="<?php // echo  str_contains($_SERVER['REQUEST_URI'], "?") ? "" : "./assets/public/lib/owlcarousel/owl.carousel.min.js" ; ?>"></script>
    <script src="../assets/public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/js/ajax-cart221b.js"></script>


    <!-- link css -->
    <link rel="stylesheet" href="../assets/admin/css/login.css">
</head>

<body>
    <section class="login-block" id="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Login Now</h2>
                    <form class="login-form" action="index.php?login" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>


                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                <small>Remember Me</small>
                            </label>
                            <button type="submit" class="btn btn-login float-right">Submit</button>
                        </div>

                    </form>
                    <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="">Long Tiến</a></div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://static.pexels.com/photos/33972/pexels-photo.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" class="d-block w-100" alt="...">
                            </div>
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
    </section>

   <?php echo isset($data["alert"]) ? $data["alert"] : ""; ?>
    <script src="../assets/admin/plugins/bootstrap/js/bootstrap.js"></script>
    <script>
        window.onload = function() {
            const body = document.getElementById('login-block');
            let height = window.innerHeight;
            body.style.height = height + 'px';
        }
    </script>
    
</body>

</html>