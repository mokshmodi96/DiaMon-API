<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = delete_doctor($_GET["id"]);
    if($result){
        header("location:doctor_list.php?msg=Doctor Deleted");
    }else{
        header("location:doctor_list.php?msg=Doctor Cannot Be Deleted");
    }
}else{
    die("Invalid Doctor");
}