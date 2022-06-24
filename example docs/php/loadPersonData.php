<?php
session_start();
$id = $_GET["id"];

include "../php/dbConnect.php";
include "../php/securityAlgos.php";

$query = "SELECT name, fbLink, info FROM people WHERE id = '$id'";
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
