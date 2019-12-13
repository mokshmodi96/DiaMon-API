<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = verify_user($_GET["id"]);
    if($result){
        header("location:user_list.php?msg=User Verified");
    }else{
        header("location:user_list.php?msg=User Cannot Be Verified");
    }
}else{
    die("Invalid User");
}