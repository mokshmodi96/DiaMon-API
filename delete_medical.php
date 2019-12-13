<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = delete_medicine($_GET["id"]);
    if($result){
        header("location:medical_list.php?msg=Medical Store Deleted");
    }else{
        header("location:medical_list.php?msg=Medical Store Not Deleted");
    }
}else{
    die("Invalid Medical Store");
}