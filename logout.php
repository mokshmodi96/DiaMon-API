<?php
session_start();
if(isset($_SESSION["username"])){
    $_SESSION["username"]=null;
    session_destroy();
    header("location:index.php");
    exit(0);
}