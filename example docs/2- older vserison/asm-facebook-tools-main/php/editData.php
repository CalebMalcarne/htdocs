<?php
session_start();
include "dbConnect.php";
include "securityAlgos.php";

if (isset($_POST["newName"])) {
    $name = encrypt($_POST["newName"], $key);
    $fb = encrypt($_POST["newFb"], $key);
    if (isset($_POST["newInfo"])) {
        $info = encrypt($_POST["newInfo"], $key);
        $query = "INSERT INTO people (name, fblink, info) VALUES ('$name', '$fb', '$info')";
    } else {
        $query = "INSERT INTO people (name, fblink, info) VALUES ('$name', '$fb', NULL)";
    }
    
    $mysqli->query($query);
    
    $id = $mysqli->insert_id;
    $date = encrypt($_POST["date"], $key);
    $method = encrypt($_POST["method"], $key);
    $companionship = encrypt($_POST["companionship"], $key);

    $query = "INSERT INTO history (personid, date, method, companionship) VALUES ('$id', '$date', '$method', '$companionship')";
    $mysqli->query($query);

    unset($_POST["newName"]);
    unset($_POST["newFb"]);
    unset($_POST["newInfo"]);
    unset($_POST["date"]);
    unset($_POST["method"]);
    unset($_POST["companionship"]);
}

if (isset($_POST["editName"])) {
    $id = $_POST["editPersonId"];
    $name = encrypt($_POST["editName"], $key);
    $fb = encrypt($_POST["editFb"], $key);
    $info = encrypt($_POST["editInfo"], $key);

    $query = "UPDATE people SET name = '$name', fblink = '$fb', info = '$info' WHERE id = '$id'";
    $mysqli->query($query);

    unset($_POST["editName"]);
    unset($_POST["editFb"]);
    unset($_POST["editInfo"]);
}

if (isset($_POST["newDate"])) {
    $id = $_POST["id"];
    $date = encrypt($_POST["newDate"], $key);
    $method = encrypt($_POST["newMethod"], $key);
    $companionship = encrypt($_POST["newCompanionship"], $key);

    $query = "INSERT INTO history (personid, date, method, companionship) VALUES ('$id', '$date', '$method', '$companionship')";
    $mysqli->query($query);

    unset($_POST["newDate"]);
    unset($_POST["newMethod"]);
    unset($_POST["newCompanionship"]);
}

if (isset($_POST["editDate"])) {
    $id = $_POST["editContactId"];
    $date = encrypt($_POST["editDate"], $key);
    $method = encrypt($_POST["editMethod"], $key);
    $companionship = encrypt($_POST["editCompanionship"], $key);

    $query = "UPDATE history SET date = '$date', method = '$method', companionship = '$companionship' WHERE id = '$id'";
    $mysqli->query($query);

    unset($_POST["editDate"]);
    unset($_POST["editMethod"]);
    unset($_POST["editCompanionship"]);
}

if ($_SESSION["path"] == "user") {
    header("Location: /user/people.php");
} else if ($_SESSION["path"] == "admin") {
    header("Location: /admin/people.php");
}
?>