<?php
$err = 0;
if ($_POST["zone"]) {
    session_start();
    include "dbConnect.php";
    include "securityAlgos.php";

    $zone = $mysqli->real_escape_string($_POST["zone"]);
    $password = hashPass($mysqli->real_escape_string($_POST["password"]));
    if ($zone == '-Admin-'){
        $query = "SELECT * FROM zone_signin WHERE user = '-Admin-' AND pass = '$password'";
        $mysqli->query($query);
    }
    else {
        $query = "SELECT * FROM zone_signin WHERE user = 'zonePass' AND pass = '$password'";
        $mysqli->query($query);
    }

    if ($mysqli->affected_rows == 1) {
        if ($zone == "Camelback") {
            $_SESSION["database"] = "camelback";
            $_SESSION["zone"] = "Camelback";
        } else if ($zone == "Payson"){
            $_SESSION["database"] = "payson";
            $_SESSION["zone"] = "Payson";
        } else if ($zone == "Maricopa"){
            $_SESSION["database"] = "maricopa";
            $_SESSION["zone"] = "Maricopa";
        } else if ($zone == "-Admin-") {
            $_SESSION["path"] = "/users/admin";
            $_SESSION["zone"] = "Admin";
        }

        $_SESSION["auth"] = 1;
        $_SESSION['logon'] = date("m/d/Y @ g:i:s:A");
        $path = $_SESSION["path"];
        
        if ($_SESSION["zone"] == "Admin"){
            header("Location: ../admin/people.php");
        } else { header("Location: /user/people.php");}
    } else {
        $err = 1;
        //echo "<script>document.getElementById('signInFailedMessage').hidden = false;</script>";
    }
    
}
?>
