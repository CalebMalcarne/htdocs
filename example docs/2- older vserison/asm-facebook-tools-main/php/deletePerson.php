<?php
session_start();
include "dbConnect.php";

$id = $_GET["id"];
$query = "DELETE FROM people WHERE id = '$id'";
$mysqli->query($query);

$query = "DELETE FROM history WHERE personId = '$id'";
$mysqli->query($query);

if ($_SESSION["path"] == "user") {
    header("Location: /user/people.php");
} else if ($_SESSION["path"] == "admin") {
    header("Location: /admin/people.php");
}
?>