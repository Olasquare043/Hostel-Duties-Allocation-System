<?php
session_start();
include('connection.php');
include('header.php');
// define variables and set to empty values
// $staffId = $password  = "";

if (isset($_POST['staffId']) && isset($_POST['password'])) {
    $staffId = test_input($_POST["staffId"]);
    $password = test_input($_POST["password"]);
        if (empty($staffId) || empty($password)) {
            $_SESSION['errorMessage'] = "Both Staff ID and Password is required";
            header("Location: staffLogin.php");
        }
        $query = "SELECT * FROM `staff` WHERE `staff_Id` ='" . $staffId . "'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $dbstaffId = $row['staff_Id'];
            $dbpass = $row['pswd'];
            //if (password_verify($password, $dbpass)) {
            if ($dbpass == $password) {
                $_SESSION['msg1'] = "Login Successfully";
                $_SESSION['staffId'] = $staffId;
                header("Location: Staff/index.php");
            } else {
                $_SESSION['errorMessage'] = "Wrong Username or Password .$staffId";
                header("Location: staffLogin.php");
            }
        } else {
            $_SESSION['errorMessage'] = "Wrong Username or Password";
            header("Location: staffLogin.php");
        }
} 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
include('footer.php');
