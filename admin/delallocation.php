<?php
session_start();
if (isset($_SESSION['adminId'])) {
    include('../connection.php');
    include('databank.php');
    $result= getAllAllocation($db);
    $month = date('n');  // Current month
    $year = date('Y');   // Current year
    if(mysqli_num_rows($result)>0){
        $query = "DELETE FROM dutyallocation WHERE month='".$month."' AND year='".$year."'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $_SESSION['msgTitle'] = "Good Job!";
        $_SESSION['msg'] = "All Allocation deleted Successfully!";
        $_SESSION['msgStyle'] = 1;
        header("location:allocation.php");
    }else{
        $_SESSION['msgTitle'] = "Oh Oooops!";
        $_SESSION['msg'] = "Allocation record is empty already!";
        $_SESSION['msgStyle'] = 0;
        header("location:allocation.php");
    }
    
} else {
    header("location:../index.php");
}
?>