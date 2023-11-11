<?php
session_start();
include('config/dbcon.php');
include('../function/myfunctions.php');

if (isset($_POST['add_shipping_btn'])) {
    $name_ship = $_POST['name_ship'];
    $price = $_POST['price'];

    // Thêm kiểm tra nếu cần thiết, ví dụ: kiểm tra giá trị dương cho giá vận chuyển

    // Trước tiên, kiểm tra xem tên đơn vị vận chuyển đã tồn tại trong cơ sở dữ liệu chưa
    $check_query = "SELECT * FROM shipping_unit WHERE name_ship = '$name_ship'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Tên đơn vị vận chuyển đã tồn tại, xuất thông báo lỗi
        redirect("add-shipping-unit.php", "Đơn vị vận chuyển đã tồn tại");
    } else {
        // Tên đơn vị vận chuyển chưa tồn tại, thêm vào cơ sở dữ liệu
        $shipping_query = "INSERT INTO shipping_unit (name_ship, price) VALUES ('$name_ship', '$price')";
        $shipping_query_run = mysqli_query($con, $shipping_query);

        if ($shipping_query_run) {
            redirect("add-shipping-unit.php", "Thêm đơn vị vận chuyển thành công!");
        } else {
            redirect("add-shipping-unit.php", "Thêm đơn vị vận chuyển thất bại!");
        }
    }
}



?>