<?php
session_start();
include "dbConnect.php";
include "securityAlgos.php";

$id = $_GET["id"];

$query = "SELECT name, fblink, info FROM people WHERE id = '$id'";
$result = $mysqli->query($query);
while ($data = $result->fetch_assoc()) {
    class Person {}

    $person = new Person();
    $person->name = decrypt($data["name"], $key);
    $person->fb = decrypt($data["fblink"], $key);
    $person->info = decrypt($data["info"], $key);

    $json = json_encode($person);
    echo $json;
}
?>