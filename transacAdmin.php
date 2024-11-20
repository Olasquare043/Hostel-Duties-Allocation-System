<?php
session_start();
include('connection.php');
include('header.php');
// define variables and set to empty values
$adminId = $password  = "";
if (isset($_POST['adminId']) && isset($_POST['password'])) {
    $adminId = test_input($_POST["adminId"]);
    $password = test_input($_POST["password"]);
}
        if (empty($adminId) || empty($password)) {
            $_SESSION['errorMessage'] = "Both AdminId and Password is required";
            header("Location: adminLogin.php");
        }
        $query = "SELECT * FROM admins WHERE ID ='$adminId'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $dbadminId = $row['ID'];
            $dbpass = $row['pswd'];
           // if (password_verify($password, $dbpass)) {
             if ($dbpass == $password) {
                $_SESSION['msg1'] = "Login Successfully";
                $_SESSION['adminId'] =  $row['ID'];
                header("Location: admin/index.php");
                } else {
                    $_SESSION['errorMessage'] = "Wrong Username or Password";
                    header("Location: adminLogin.php");
                }
            } else {
                $_SESSION['errorMessage'] = "Wrong Username or Password";
                header("Location: adminLogin.php");
            }
        // }
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
include('footer.php');
?>