<?php
$mysqli = new mysqli("localhost", "root", "asm2020", "signin");

if ($mysqli->connect_error) {
    die("Connect Error: " . $mysqli->connect_error);
}
?>
