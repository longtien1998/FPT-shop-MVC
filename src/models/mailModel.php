<?php


// require_once("./assets/public/phpmailer-library/src/PHPMailer.php");
require_once("./assets/public/phpmailer-library/src/PHPMailer.php");
require_once("./assets/public/phpmailer-library/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;

     function MailModel($email, $code)
    {

        $mail = new PHPMailer(true);
        // Server settings
        $mail->isSMTP();                                            // sử dụng SMTP
        $mail->Host       = 'smtp.gmail.com';                    // server mail SMTP
        $mail->SMTPAuth   = true;                                   // cho phép xác thực SMTP
        $mail->Username   = 'tientlpd07578@fpt.edu.vn';                     // tài khoản mail
        $mail->Password   = 'bjvztnuwhjorniwb';                               // mật khẩu
        $mail->SMTPSecure = 'tls';         // tùy chọn mã hóa
        $mail->Port       = 587;                                    // cổng kết nối tới server

        // Recipients
        $mail->setFrom('tientlpd07578@fpt.edu.vn', 'FPT Shop'); // Địa chỉ mail sử dụng để gửi
        $mail->addAddress($email);     // Địa chỉ mail gửi đi
        // $mail->addAddress('ellen@example.com');
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment("bo_kho.png");         // Đính kèm file

        // Content
        $mail->isHTML(true);                                  // nội dung mail
        $mail->Subject = 'CODE SIGUP BY FPT SHOP ';
        $mail->Body  = '<p>Xin chào ' . $email . '</p>
                        <p>Mã xác nhận để đăng ký mới tại FPT Shop là : </p>
                        <h3>' . $code . '</h3>';
        // $mail->Body = "<h1>Xin chào, <img src='https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/07/hinh-dep.jpg' width='100%' /></h1>"; // Có sử dụng file trong nội dung

        // if($mail->send()){
        //     echo 'Message has been sent';
        // } else{
        //     echo "Message hasn't been sent";
        // }
        return $mail->send();
    }

