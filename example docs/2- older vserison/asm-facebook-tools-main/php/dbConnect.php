<?php
$mysqli = @new mysqli("localhost", "root", "", $_SESSION["database"]);

if ($mysqli->connect_error) {
    error_log("Connection error: " . $mysqli->connect_error);
}
?>