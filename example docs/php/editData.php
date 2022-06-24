<?php
if ($_POST["newName"]) {
    include "dbConnect.php";
    include "securityAlgos.php";

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
    $cntNote = encrypt($_POST["cntNote"], $key);

    $query = "INSERT INTO history (personId, id, contactDate, contactMethod, cntNote, companionship) VALUES ('$id', NULL, '$date', '$method', '$cntNote', '$companionship')";
    $mysqli->query($query);
}

if ($_POST["editName"]) {
    include "dbConnect.php";
    include "securityAlgos.php";

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
    include "dbConnect.php";
    include "securityAlgos.php";
    
    $id = $_POST["id"];
    $date = $_POST["newDate"];
    $method = $_POST["newMethod"];
    $cntNote = encrypt($_POST["newcntNote"], $key);
    $companionship = $_POST["newCompanionship"];

    $query = "INSERT INTO history (personId, id, contactDate, contactMethod, cntNote, companionship) VALUES ('$id', NULL, '$date', '$method', '$cntNote', '$companionship')";
    $mysqli->query($query);
}

if ($_POST["editDate"]) {
    include "dbConnect.php";
    include "securityAlgos.php";

    $id = $_POST["editContactId"];
    $date = $_POST["editDate"];
    $method = $_POST["editMethod"];
    $cntNote = encrypt($_POST["editcntNote"], $key);
    $companionship = $_POST["editCompanionship"];

    $query = "UPDATE history SET contactDate = '$date', contactMethod = '$method', cntNote = '$cntNote', companionship = '$companionship' WHERE id = '$id'";
    $mysqli->query($query);
}
?>
