<?php
session_start();
include('../admin/config/dbcon.php');

if (isset($_SESSION['auth'])) {

    if (isset($_POST['placeOrderBtn'])) {


        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);
        if ($name == "" || $email == "" || $phone == "" || $address == "") {
            $_SESSION['message'] = "Hãy điền đầy đủ thông tin";
            header('Location:../checkout.php ');
            exit(0);
        }

        $user_id = $_SESSION['auth_user']['user_id'];

        $query = "SELECT c.id AS cart_id, p.id AS product_id, p.productName, p.image,p.price, c.prod_qty FROM carts c JOIN product p ON c.prod_id = p.id WHERE c.user_id = '$user_id'";

        $query_run = mysqli_query($con, $query);

        $totalPrice = 0;

        foreach ($query_run as $citem) {
            $totalPrice += $citem['price'] * $citem['prod_qty'];
        }
        $tracking_no = "ntv" . rand(1111, 9999) . substr($phone, 2);
        $user_id = $_SESSION['auth_user']['user_id'];

        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone , address, total_price, payment_mode, payment_id) 
        VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address','$totalPrice','$payment_mode' ,'$payment_id')";

        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($con);
            foreach ($query_run as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['price'];
             
                $insert_items_query = "INSERT INTO order_items (order_id,prod_id, qty, price) VALUES ('$order_id','$prod_id','$prod_qty',$price)";
                $insert_items_query_run = mysqli_query($con, $insert_items_query);

            }
            $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$user_id'";
            $deleteCartQuery_run = mysqli_query($con,$deleteCartQuery);


            $_SESSION['message'] = "Thành công! ";
            header('Location: ../my-orders.php');
            die();
        }

    }
} else {
    header('Location:../index.php');
}


?>