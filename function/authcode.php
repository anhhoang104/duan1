<?php

session_start();

// include('myfunctions.php');

include('../admin/config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;

function send_password_reset($username, $useremail, $token)
{
    $body = "
        <h2>Chào bạn</h2>
        <h3>Bạn muốn đặt lại mật khẩu mới vì bạn đã quên nó.</h3>
        <a href='http://localhost/bannoithat/password-change.php?token=$token&email=$useremail'> Click Me </a>
            ";
    $subject = 'Thay đổi mật khẩu';

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com"; // smtp address of your email
    $mail->SMTPAuth = true;
    $mail->Username = '19004002@st.vlute.edu.vn';
    $mail->Password = 'tvwdnotidmkwhfor';
    $mail->Port = 587; // port
    $mail->SMTPSecure = "tls"; // tls or ssl
    $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    $mail->isHTML(true);
    $mail->setFrom('19004002@st.vlute.edu.vn', 'NoiThatViet');
    $mail->addAddress($useremail); // enter email address whom you want to send
    $mail->Subject = ("$subject");
    $mail->Body = $body;
    $mail->send();




}




if (isset($_POST['register_btn'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));

    //check email
    $check_email_query = "Select email from users where email = '$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {


        $_SESSION['message'] = 'Email đã được đăng kí';
        header('Location: ../register.php');
    } else {

        if ($password == $cpassword) {
            // 
            $insert_query = "insert into users (name,email,phone,password) values ('$name','$email','$phone','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                // redirect("../login.php","Đăng kí thành công");
                $_SESSION['message'] = "Đăng kí thành công";
                header('Location: ../login.php');
            } else {
                // redirect("../register.php","Đăng kí thất bại");
                $_SESSION['message'] = "Đăng kí thất bại";
                header('Location: ../register.php');
            }

        } else {
            // redirect("../register.php","Mật khẩu không khớp");
            $_SESSION['message'] = "Mật khẩu không khớp";
            header('Location: ../register.php');
        }
    }



}
if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $login_query = "Select * from users where email = '$email' and password = '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        $_SESSION['auth'] = true;


        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id_user'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $type = $userdata['type']; // lấy type trong sql

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail,

        ];
        //phân quyền
        $_SESSION['type'] = $type;

        if ($type == 1) {
            // redirect("../admin/index.php","Chào bạn đến với Admin");
            $_SESSION['message'] = "Chào bạn đến với Admin";
            header('Location: ../admin/index.php');
        } else {
            // redirect("../index.php","Đăng nhập thành công");
            $_SESSION['message'] = "Đăng nhập thành công";
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['message'] = "Đăng nhập không thành công";
        header('Location: ../login.php');
    }


}

if (isset($_POST['password-reset-link'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email_query = "Select * from users where email = '$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $userdata = mysqli_fetch_array($check_email_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];

        $update_token = "UPDATE users SET token = '$token' WHERE email = '$useremail' LIMIT 1 ";
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run) {

            send_password_reset($username, $useremail, $token);



            $_SESSION["message"] = "Để đặt lại mật khẩu hãy kiểm tra Email: $useremail của bạn ";
            header("Location:../password-reset.php");
            exit(0);
        } else {
            $_SESSION["message"] = "Lỗi không tồn tại!";
            header("Location:../password-reset.php");
            exit(0);
        }

    } else {
        $_SESSION["message"] = "Email không tồn tại";
        header("Location:../password-reset.php");
        exit(0);
    }
}

if (isset($_POST['password-update'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, ($_POST['new_password']));
    $comfirm_password = mysqli_real_escape_string($con, ($_POST['comfirm_password']));
    $hashed_new_password = md5($new_password);

    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($comfirm_password)) {
            $check_token = "SELECT token FROM users WHERE token = '$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {

                if ($new_password == $comfirm_password) {
                    $update_password = "UPDATE users SET password = '$hashed_new_password' WHERE token = '$token' LIMIT 1 ";
                    $update_password_run = mysqli_query($con, $update_password);

                    if ($update_password_run) {
                        
                        $_SESSION['message'] = "Cập nhật mật khẩu thành công! Hãy đăng nhập lại";          
                        header("Location:../login.php");
                        exit(0);
                    } else {
                        $_SESSION['message'] = "Không thể cập nhật mật khẩu!";
                        header("Location:../password-change.php?token=$token&email=$email");
                        exit(0);
                    }

                } else {
                    $_SESSION['message'] = "Mật khẩu cũ và mới không đúng";
                    header("Location:../password-change.php?token=$token&email=$email");
                    exit(0);
                }

            } else {
                $_SESSION['message'] = "Token không hợp lệ~";
                header("Location:../password-change.php?token=$token&email=$email");
                exit(0);
            }

        } else {
            $_SESSION['message'] = "Không được bỏ trống~";
            header("Location:../password-change.php?token=$token&email=$email");
            exit(0);
        }

    } else {
        $_SESSION['message'] = "Không có Token";
        header('Location:../password-change.php');
        exit(0);
    }
}

?>