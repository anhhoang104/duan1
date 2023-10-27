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

        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.productName, p.image, p.price
        FROM carts c
        JOIN product p ON c.prod_id = p.id
        WHERE c.user_id = '$user_id'
        ORDER BY c.id DESC;
        ";
       
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

                # Select vào product để xóa qty khi mua số lượng sản phẩm
                $product_query = "SELECT * FROM product WHERE id = '$prod_id' LIMIT 1 ";
                $product_query_run = mysqli_query($con,$product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['quantity'];

                
                $new_qty = $current_qty - $prod_qty;
                $updateQty_query = "UPDATE product SET quantity =' $new_qty' WHERE id = '$prod_id'";
                $updateQty_query_run = mysqli_query($con, $updateQty_query);
              


            }
            $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$user_id'";
            $deleteCartQuery_run = mysqli_query($con,$deleteCartQuery);

            if($payment_mode == "Thanh toán khi nhận hàng") {
                $_SESSION['message'] = "Thành công! ";
                header('Location: ../my-orders.php');
                die();
            }else{
                echo 201;
            }


          
        }

    }
} else {
    header('Location:../index.php');
}


?>