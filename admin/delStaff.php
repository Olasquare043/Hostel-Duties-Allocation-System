<?php
session_start();
if (isset($_SESSION['adminId'])) {
	include('../connection.php');
if (isset($_GET['staff_id'])){
	$staff_id= $_GET['staff_id'];
		$query = "DELETE FROM staff WHERE staff_id = $staff_id";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$_SESSION['msgTitle'] = "Good Job!";
		$_SESSION['msg'] = "Staff delete Successfully!";
		$_SESSION['msgStyle'] = 1;
		header("location:allStaff.php");
}
} else {
	header("location:../index.php");
}