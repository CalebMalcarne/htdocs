<?php
$_SESSION["database"] = "signin";
include "../php/dbConnect.php";
include "../php/securityAlgos.php";

if (isset($_GET["err"])) {
    $error = mysqli_real_escape_string($mysqli, $_GET['err']);
}

if (isset($_GET["sub"])) {
    $sub = mysqli_real_escape_string($mysqli, $_GET['sub']);
}

if (isset($_POST["zone"])) {
    $zone = mysqli_real_escape_string($mysqli, $_POST["zone"]);
    $raw_pass = mysqli_real_escape_string($mysqli, $_POST["old_password"]);
    $new_pass = mysqli_real_escape_string($mysqli, $_POST["new_password"]);
    $re_pass = mysqli_real_escape_string($mysqli, $_POST["re_password"]);

    $password = hash('sha256', $raw_pass);
    $sql = "SELECT * FROM user_login WHERE user = '".$zone."' AND pass = '".$password."' limit 1";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) == 1) {
        if ($new_pass == $re_pass) {
            if ($new_pass != $raw_pass) {
                $hashed_pass = hashPass($new_pass);
                $sql = "UPDATE user_login SET pass = '".$hashed_pass."' WHERE user = '".$zone."'";
                $mysqli->query($sql);    
                header("Location: adminTools.php?sub=1"); 
            } else {header("Location: adminTools.php?err=2");}
        } else {header("Location: adminTools.php?err=1");} 
    } else {header("Location: adminTools.php?err=3");}
}
?>
