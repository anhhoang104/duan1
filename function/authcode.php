<?php

session_start();

include('myfunctions.php');
include('../admin/config/dbcon.php');

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
                redirect("../login.php","Đăng kí thành công");
                // $_SESSION['message'] = "Đăng kí thành công";
                // header('Location: ../login.php');
            } else {
                redirect("../register.php","Đăng kí thất bại");
                // $_SESSION['message'] = "Đăng kí thất bại";
                // header('Location: ../register.php');
            }

        } else {
            redirect("../register.php","Mật khẩu không khớp");
            // $_SESSION['message'] = "Mật khẩu không khớp";
            // header('Location: ../register.php');
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
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $type = $userdata['type']; // lấy type trong sql

        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail,

        ];
        //phân quyền
        $_SESSION['type'] = $type;

        if ($type == 1) {
            redirect("../admin/index.php","Chào bạn đến với Admin");
            // $_SESSION['message'] = "Chào bạn đến với Admin";
            // header('Location: ../admin/index.php');
        }else{
            redirect("../index.php","Đăng nhập thành công");
            // $_SESSION['message'] = "Đăng nhập thành công";
            // header('Location: ../index.php');
        }







    } else {
        $_SESSION['message'] = "Đăng nhập không thành công";
        header('Location: ../login.php');
    }


}
?>