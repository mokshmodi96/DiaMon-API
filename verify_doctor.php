<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = verify_doctor($_GET["id"]);
    if($result){
        header("location:doctor_list.php?msg=Doctor Verified");
    }else{
        header("location:doctor_list.php?msg=Doctor Cannot Be Verified");
    }
}else{
    die("Invalid Doctor");
}