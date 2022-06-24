<?php
session_start();

$_SESSION["zone"] = $_POST["zone"];
if ($_SESSION["zone"] == "Camelback") {
    $_SESSION["database"] = "camelback";
} else if ($_SESSION["zone"] == "Mesa Maricopa") {
    $_SESSION["database"] == "mesamaricopa"
} else if ($_SESSION["zone"] == "Paradise Valley") {
    $_SESSION["database"] = "paradisevalley";
} else if ($_SESSION["zone"] == "Payson") {
    $_SESSION["database"] = "payson";
} else if ($_SESSION["zone"] == "Phoenix") {
    $_SESSION["database"] = "phoenix";
} else if ($_SESSION["zone"] == "Phoenix East") {
    $_SESSION["database"] = "phoenixeast";
} else if ($_SESSION["zone"] == "Round Valley") {
    $_SESSION["database"] = "roundvalley";
} else if ($_SESSION["zone"] == "Scottsdale North") {
    $_SESSION["database"] = "scottsdalenorth";
} else if ($_SESSION["zone"] == "Show Low") {
    $_SESSION["database"] = "showlow";
} else if ($_SESSION["zone"] == "Snowflake") {
    $_SESSION["database"] = "snowflake";
} else if ($_SESSION["zone"] == "White Mountain") {
    $_SESSION["database"] = "whitemountain";
}

header("Location: ../people.php");
?>