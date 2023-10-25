<?php
// session_start();
include('config/dbcon.php');

function getAll($table){
    global $con;
    $query = "Select * from $table ";
    return $query_run = mysqli_query($con,$query);
}
function getByID($table,$id){
    global $con;
    $query = "Select * from $table where id='$id' ";
    return $query_run = mysqli_query($con,$query);
}
function getAllOrders(){
    global $con;
    // $query = "SELECT o.*, u.name FROM orders o,users u where status='0' AND o.user_id = u.id_user ";
    $query = "SELECT * FROM orders WHERE status = '0'";
    return $query_run = mysqli_query($con,$query);
}
function getOrdersHistory(){
    global $con;
    // $query = "SELECT o.*, u.name FROM orders o,users u where status='0' AND o.user_id = u.id_user ";
    $query = "SELECT * FROM orders WHERE status != '0'";
    return $query_run = mysqli_query($con,$query);
}

    //function để thông báo 
    function redirect($url,$message){
        $_SESSION['message'] = $message;
        header('Location:' .$url);
        exit(0);
    }
    function checkTrackingNoValid($tracking_no){
        global $con;
        $query = "SELECT * FROM orders WHERE tracking_no = '$tracking_no' ";
        return $query_run = mysqli_query($con,$query);
    }

?>
