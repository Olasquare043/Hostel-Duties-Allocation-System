<?php
session_start();
if (isset($_SESSION["studentid"])){
    unset($_SESSION["studentid"]);
    header("location:../index.php");
}  
header("location:../index.php");
?>