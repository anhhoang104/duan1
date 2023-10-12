<?php 
    // session_start();
    include('admin/config/dbcon.php');


    function getAll($table){
        global $con;
        $query = "Select * from $table ";
        return $query_run = mysqli_query($con,$query);
    }
    function redirect($url,$message){
        $_SESSION['message'] = $message;
        header('Location:' .$url);
        exit();
    }
    function getID($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE id = '$id'";
        return $query_run = mysqli_query($con,$query);
    }
    function getProductbyCid($table,$cid){
        global $con;
        $query = "SELECT * FROM $table WHERE catid = '$cid'";
        return $query_run = mysqli_query($con,$query);
    }

?>