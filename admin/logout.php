<?php
session_start();
if (isset($_SESSION["adminId"])){
    unset($_SESSION["adminId"]);
    header("location:../index.php");
}  
header("location:../index.php");
?>