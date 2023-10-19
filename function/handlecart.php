<?php
session_start();
include('../admin/config/dbcon.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case "add": // thêm vào giỏ hàng
                $prodid = $_POST['prodid'];
                $prodqty = $_POST['prodqty'];
                $user_id = $_SESSION['auth_user']['user_id'];
                $check_existing_cart = "SELECT * FROM carts WHERE prod_id = '$prodid' AND user_id = '$user_id'";
                $check_existing_cart_run = mysqli_query($con, $check_existing_cart);
                if (mysqli_num_rows($check_existing_cart_run) > 0) {
                    echo '<div class="alert alert-danger alert-dismissible mt2"><strong> Sản phẩm đã có trong giỏ hàng </strong></div>';
                } else {
                    $insert_query = "INSERT INTO carts (user_id,prod_id,prod_qty) VALUES ('$user_id','$prodid','$prodqty')";
                    $insert_query_run = mysqli_query($con, $insert_query);
                    if ($insert_query_run) {
                        echo '<div class="alert alert-success alert-dismissible mt2"><strong> Đã thêm sản phẩm vào giỏ hàng </strong></div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible mt2"><strong> Thêm sản phẩm bị lỗi</strong></div>';
                    }
                }
                break;
            case "update": // cập nhật lại giỏ hàng
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['auth_user']['user_id'];
                $check_existing_cart = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                $check_existing_cart_run = mysqli_query($con, $check_existing_cart);
                if (mysqli_num_rows($check_existing_cart_run) > 0) {
                    $update_query = "UPDATE carts SET prod_qty = '$prod_qty' WHERE prod_id = '$prod_id' AND user_id = '$user_id' ";
                    $update_query_run = mysqli_query($con, $update_query);
                    if ($update_query_run) {
                        echo '<div class="alert alert-success alert-dismissible mt2"><strong>Cập nhật số lượng thành công</strong></div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible mt2"><strong>Cập nhật số lượng không thành công</strong></div>';
                    }
                } else {        
                    echo '<div class="alert alert-danger alert-dismissible mt2"><strong>Đã xảy ra sự cố!</strong></div>';
                }
                break;
            default:
                echo '<div class="alert alert-danger alert-dismissible mt2"><strong>Đã xảy ra sự cố!</strong></div>';
                break;
        }
    }
} else {
    echo '<div class="alert alert-danger alert-dismissible mt2"><strong> Hãy đăng nhập trước khi thêm vào giỏ hàng </strong></div>';
}
?>
