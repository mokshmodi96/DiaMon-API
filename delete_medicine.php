<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = delete_medicine($_GET["id"]);
    if($result){
        header("location:medicine_list.php?msg=Medicine Deleted");
    }else{
        header("location:medicine_list.php?msg=Medicine Not Deleted");
    }
}else{
    die("Invalid Medicine");
}