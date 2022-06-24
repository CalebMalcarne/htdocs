<?php
session_start();
$_SESSION['database'] = "logs";
include '../../php/dbConnect.php';


$query = "SELECT id, zone, logon, logoff, location FROM userLog";
$result = $mysqli->query($query);

// Build Log rows
if ($mysqli->affected_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Build log box
        echo "<th>" . $row["zone"] ."</td>";
        echo "<td>" . $row["logon"] . "</td>";
        echo "<td>" . $row["logoff"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";

        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='5'>No Logs to Display</td>";
    echo "</tr>";
}
$_SESSION['database'] = $_SESSION['zone_ad'];
?>