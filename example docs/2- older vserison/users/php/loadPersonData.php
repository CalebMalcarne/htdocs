<?php
session_start();
$id = $_GET["id"];

include "../../php/dbConnect.php";
include "../../php/securityAlgos.php";

$query = "SELECT name, fbLink, info FROM people WHERE id = '$id'";
$result = $mysqli->query($query);
if ($mysqli->affected_rows > 0) {
    while ($data = $result->fetch_assoc()) {
        $person->name = decrypt($data["name"], $key);
        $person->fb = decrypt($data["fbLink"], $key);
        $person->info = decrypt($data["info"], $key);

        $json = json_encode($person);
        echo $json;
    }
}
?>
