<?php
include_once "DB_Conn/function.php";
if(isset($_GET["id"])){
    $result = delete_user($_GET["id"]);
    if($result){
        header("location:user_list.php?msg=User Deleted");
    }else{
        header("location:user_list.php?msg=User Cannot Be Deleted");
    }
}else{
    die("Invalid User");
}