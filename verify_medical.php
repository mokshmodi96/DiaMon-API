<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = verify_medical($_GET["id"]);
    if($result){
        header("location:medical_list.php?msg=Medical Store Verified");
    }else{
        header("location:medical_list.php?msg=Medical Store Cannot Be Verified");
    }
}else{
    die("Invalid Medical Store");
}