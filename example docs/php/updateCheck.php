<?php
session_start();
$_SESSION["path"] = $_GET["path"];
include "dbConnect.php";
$path = $_SESSION["path"];

$id = $mysqli->real_escape_string($_GET["id"]);
$check = $mysqli->real_escape_string($_GET["type"]);
$value = $mysqli->real_escape_string($_GET["value"]);

$query = "UPDATE people SET $check = '$value' WHERE id = '$id'";
$mysqli->query($query);

date_default_timezone_set("America/Phoenix");
$date = date("Y-m-d");

if ($check == "dnc" && $value == "1") {
    $query = "INSERT INTO history (personId, contactDate, contactMethod, companionship, id) VALUES ('$id', '$date', 'Do Not Contact', '', NULL)";
    $mysqli->query($query);
    $query = "UPDATE people SET interested = '0' WHERE id = '$id'";
    $mysqli->query($query);
    $query = "DELETE FROM history WHERE contactMethod = 'Interested' AND personId = '$id'";
    $mysqli->query($query);
} else if ($check == "dnc" && $value == "0") {
    $query = "DELETE FROM history WHERE contactMethod = 'Do Not Contact' AND personId = '$id'";
    $mysqli->query($query);
} else if ($check == "interested" && $value == "1") {
    $query = "INSERT INTO history (personId, contactDate, contactMethod, companionship, id) VALUES ('$id', '$date', 'Interested', '', NULL)";
    $mysqli->query($query);
} else if ($check == "interested" && $value == "0") {
    $query = "DELETE FROM history WHERE contactMethod = 'Interested' AND personId = '$id'";
    $mysqli->query($query);
} else if ($check == "referred" && $value == "1") {
    $query = "INSERT INTO history (personId, contactDate, contactMethod, companionship, id) VALUES ('$id', '$date', 'Referred', '', NULL)";
    $mysqli->query($query);
    $query = "UPDATE people SET interested = '0' WHERE id = $id";
    $mysqli->query($query);
} else if ($check == "referred" && $value == "0") {
    $query = "DELETE FROM history WHERE contactMethod = 'Referred' AND personId = '$id'";
    $mysqli->query($query);
    $query = "UPDATE people SET interested = '1' WHERE id = '$id'";
    $mysqli->query($query);
}
if ($_SESSION["zone"] == "Admin"){
    header("Location: /users/admin/people.php");
} else { header("Location: /user/people.php");}
?>
