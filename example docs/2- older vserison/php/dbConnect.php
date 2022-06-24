<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
     if ($_SESSION["database"] == "") {
         $_SESSION["database"] = $database;
     }
     $_SESSION["auth"] == 1;
}

//session_start();

$mysqli = new mysqli("localhost", "root", "asm2020", $_SESSION["database"]);

if ($mysqli->connect_error) {
    die("Connect Error: " . $mysqli->connect_error);
}
?>
