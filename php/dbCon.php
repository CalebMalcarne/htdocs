<?php
$mysqli = new mysqli("localhost", "root", "", "malcarne");

if ($mysqli->connect_error) {
    echo "unable to connact";
    die("Connect Error: " . $mysqli->connect_error);
}
?>
