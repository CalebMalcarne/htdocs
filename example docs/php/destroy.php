<?php
session_start(); 
$_SESSION["database"] = "logs";
include "dbConnect.php";
include "log.php";
session_destroy();
header("Location: ../index.php");
?>