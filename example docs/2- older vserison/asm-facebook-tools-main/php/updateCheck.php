<?php
session_start();
include "dbConnect.php";
include "securityAlgos.php";

$id = $_GET["id"];
$check = $_GET["type"];
$value = $_GET["value"];

$query = "UPDATE people SET $check = '$value' WHERE id = '$id'";
$mysqli->query($query);

date_default_timezone_set("America/Phoenix");
$date = date("Y-m-d");

if ($check == "dnc" && $value == "1") {
    $query = "INSERT INTO history (personid, date, method, companionship) VALUES ('$id', '$date', 'Do Not Contact', '')";
    $mysqli->query($query);
    $query = "UPDATE people SET interested = '0' WHERE id = '$id'";
    $mysqli->query($query);
} else if ($check == "dnc" && $value == "0") {
    $query = "DELETE FROM history WHERE method = 'Do Not Contact' AND personid = '$id'";
    $mysqli->query($query);
} else if ($check == "interested" && $value == "1") {
    $query = "INSERT INTO history (personid, date, method, companionship) VALUES ('$id', '$date', 'Interested', '')";
    $mysqli->query($query);
} else if ($check == "interested" && $value == "0") {
    $query = "DELETE FROM history WHERE method = 'Interested' AND personid = '$id'";
    $mysqli->query($query);
} else if ($check == "referred" && $value == "1") {
    $query = "INSERT INTO history (personid, date, method, companionship) VALUES ('$id', '$date', 'Referred', '')";
    $mysqli->query($query);
    $query = "UPDATE people SET interested = '0' WHERE id = $id";
    $mysqli->query($query);
} else if ($check == "referred" && $value == "0") {
    $query = "DELETE FROM history WHERE method = 'Referred' AND personid = '$id'";
    $mysqli->query($query);
    $query = "UPDATE people SET interested = '1' WHERE id = '$id'";
    $mysqli->query($query);
}

if ($_SESSION["path"] == "user") {
    header("Location: /user/people.php");
} else if ($_SESSION["path"] == "admin") {
    header("Location: /admin/people.php");
}
?>