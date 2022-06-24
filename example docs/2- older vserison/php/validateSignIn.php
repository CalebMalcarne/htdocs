<?php
if ($_POST["zone"]) {
    //session_start();
    include "dbConnect.php";
    include "securityAlgos.php";

    $zone = $mysqli->real_escape_string($_POST["zone"]);
    $password = hashPass($mysqli->real_escape_string($_POST["password"]));
    $query = "SELECT * FROM zone_signin WHERE user = '$zone' AND pass = '$password'";
    $mysqli->query($query);

    if ($mysqli->affected_rows == 1) {
        if ($zone == "Camelback") {
            $_SESSION["database"] = "camelback";
            $_SESSION["zone"] = "Camelback";
        } else if ($zone == "Maricopa") {
            $_SESSION["database"] = "maricopa";
            $_SESSION["zone"] = "Maricopa";
        } else if ($zone == "Maricopa North"){
            $_SESSION["database"] = "maricopa_north";
            $_SESSION["zone"] = "Maricopa North";
        } else if ($zone == "-Admin-") {
            $_SESSION["path"] = "/users/admin";
            $_SESSION["zone"] = "Admin";
        }

        $_SESSION["auth"] = 1;
        $path = $_SESSION["path"];
        
        if ($_SESSION["zone"] == "Admin"){
            header("Location: /users/admin/people.php");
        } else { header("Location: /users/display/people.php");}
    } else {
        echo "<script>document.getElementById('signInFailedMessage').hidden = false;</script>";
    }
}
?>
