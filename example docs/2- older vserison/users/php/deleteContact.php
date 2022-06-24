<?php
session_start();
$_SESSION["path"] = $_GET["path"];
include "../../php/dbConnect.php";

$id = $mysqli->real_escape_string($_GET["id"]);

$query = "DELETE FROM history WHERE id = '$id'";
$mysqli->query($query);

header("Location: ../display/people.php");
?>
