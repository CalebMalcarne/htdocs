<?php
if ($_POST["newName"]) {
    include "../../php/dbConnect.php";
    include "../../php/securityAlgos.php";

    $name = encrypt($_POST["newName"], $key);
    $fb = encrypt($_POST["newFb"], $key);
    $info = encrypt($_POST["newInfo"], $key);
    date_default_timezone_set("America/Phoenix");
    $dateCreated = date("Y-m-d");

    $name = $mysqli->real_escape_string($name);
    $fb = $mysqli->real_escape_string($fb);
    $info = $mysqli->real_escape_string($info);

    $query = "INSERT INTO people (id, name, fbLink, info, dateCreated) VALUES (NULL, '$name', '$fb', '$info', '$dateCreated')";
    $mysqli->query($query);
    
    $id = $mysqli->insert_id;
    $date = $_POST["date"];
    $method = $_POST["method"];
    $companionship = $_POST["companionship"];

    $query = "INSERT INTO history (personId, id, contactDate, contactMethod, companionship) VALUES ('$id', NULL, '$date', '$method', '$companionship')";
    $mysqli->query($query);
}

if ($_POST["editName"]) {
    include "../../php/dbConnect.php";
    include "../../php/securityAlgos.php";

    $id = $_POST["editPersonId"];
    $name = encrypt($_POST["editName"], $key);
    $fb = encrypt($_POST["editFb"], $key);
    $info = encrypt($_POST["editInfo"], $key);

    $name = $mysqli->real_escape_string($name);
    $fb = $mysqli->real_escape_string($fb);
    $info = $mysqli->real_escape_string($info);

    $query = "UPDATE people SET name = '$name', fbLink = '$fb', info = '$info' WHERE id = '$id'";
    $mysqli->query($query);
}

if ($_POST["newDate"]) {
    include "../../php/dbConnect.php";
    
    $id = $_POST["id"];
    $date = $_POST["newDate"];
    $method = $_POST["newMethod"];
    $companionship = $_POST["newCompanionship"];

    $query = "INSERT INTO history (personId, id, contactDate, contactMethod, companionship) VALUES ('$id', NULL, '$date', '$method', '$companionship')";
    $mysqli->query($query);
}

if ($_POST["editDate"]) {
    include "../../php/dbConnect.php";

    $id = $_POST["editContactId"];
    $date = $_POST["editDate"];
    $method = $_POST["editMethod"];
    $companionship = $_POST["editCompanionship"];

    $query = "UPDATE history SET contactDate = '$date', contactMethod = '$method', companionship = '$companionship' WHERE id = '$id'";
    $mysqli->query($query);
}
?>
