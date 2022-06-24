<?php
session_start();
$err = 0;
if ($_SESSION["path"] == 0){
    header("Location: ../user_pages/employeeData.php");
}
if ($_POST["user"]) {
    include "dbCon.php";
    $user = 0;
    $user = $mysqli->real_escape_string($_POST["user"]);

    $password = $_POST["password"];
    $query = "SELECT * FROM login WHERE user = '$user' AND pass = '$password'";
    $mysqli->query($query);

    if ($mysqli->affected_rows == 1) {

        $_SESSION["auth"] = 1;
        $_SESSION["user"] = $user;
        $_SESSION['logon'] = date("m/d/Y @ g:i:s:A");
        $path = $_SESSION["path"];
        
        if($user == 'admin'){
            header("Location: ../user_pages/adminData.php");
        } else {
            header("Location: ../user_pages/employeeData.php");
        }
    } else {
        header("Location: ../../index.php?err=1");
    }

}
?>
