<?php
session_start();
include "dbConnect.php";

$zone = hash("sha3-512", $_POST["zone"]);
$password = hash("sha3-512", $_POST["password"]);
$query = "SELECT * FROM signin WHERE zone = '$zone' AND password = '$password'";
$mysqli->query($query);

if ($mysqli->affected_rows == 1) {
    if ($_POST["zone"] == "-Admin-") {
        $_SESSION["signedin"] = true;
        header("Location: /admin/people.php");
    } else {
        if ($_POST["zone"] == "Camelback") {
            $_SESSION["database"] = "camelback";
        } else if ($_POST["zone"] == "Mesa Maricopa") {
            $_SESSION["database"] = "mesamaricopa";
        } else if ($_POST["zone"] == "Paradise Valley") {
            $_SESSION["database"] = "paradisevalley";
        } else if ($_POST["zone"] == "Payson") {
            $_SESSION["database"] = "payson";
        } else if ($_POST["zone"] == "Phoenix") {
            $_SESSION["database"] = "phoenix";
        } else if ($_POST["zone"] == "Phoenix East") {
            $_SESSION["database"] = "phoenixeast";
        } else if ($_POST["zone"] == "Round Valley") {
            $_SESSION["database"] = "roundvalley";
        } else if ($_POST["zone"] == "Scottsdale North") {
            $_SESSION["database"] = "scottsdalenorth";
        } else if ($_POST["zone"] == "Show Low") {
            $_SESSION["database"] = "showlow";
        } else if ($_POST["zone"] == "Snowflake") {
            $_SESSION["database"] = "snowflake";
        } else if ($_POST["zone"] == "White Mountain") {
            $_SESSION["database"] = "whitemountain";
        }
        $_SESSION["zone"] = $_POST["zone"];
        $_SESSION["signedin"] = true;
        header("Location: /user/people.php");
    }
} else {
    $_SESSION["js"] = "<script>document.getElementById('signInFailedMessage').hidden = false;</script>";
    header("Location: /");
}
?>