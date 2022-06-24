<?php 
session_start();
include "dbConnect.php";
include "securityAlgos.php";
$db = "signin";

mysqli_select_db($mysqli, $db);

$error = mysqli_real_escape_string($mysqli, $_GET['err']);
$sub = mysqli_real_escape_string($mysqli, $_GET['sub']);


if (isset($_POST["zone"])) {
    $zone = mysqli_real_escape_string($mysqli, $_POST["zone"]);
    $raw_pass = mysqli_real_escape_string($mysqli, $_POST["old_password"]);
    $new_pass = mysqli_real_escape_string($mysqli, $_POST["new_password"]);
    $re_pass = mysqli_real_escape_string($mysqli, $_POST["re_password"]);

    $password = hash('sha256', $raw_pass);
    $sql = "SELECT * FROM zone_signin WHERE user = '".$zone."' AND pass = '".$password."' limit 1";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) == 1) {
        if ($new_pass == $re_pass) {
            if ($new_pass != $raw_pass) {
                if (strlen($new_pass) >= 8){
                    if (preg_match('/[A-Za-z]/', $new_pass) && preg_match('/[0-9]/', $new_pass)){
                        $hashed_pass = hashPass($new_pass);
                        $sql = "UPDATE zone_signin SET pass = '".$hashed_pass."' WHERE user = '".$zone."'";
                        $mysqli->query($sql);    
                        header("Location: tools.php?sub=1"); 
                    } else {header ("Location: tools.php?err=5");} 
                } else { header("Location: tools.php?err=4");}
            } else {header("Location: tools.php?err=2");}
        } else {header("Location: tools.php?err=1");} 
    } else {header("Location: tools.php?err=3");}
}
?>