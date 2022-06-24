<?php
session_start();
include "dbConnect.php";
include "securityAlgos.php";

$personId = $_GET["id"];

$query = "SELECT * FROM history WHERE personid = '$personId' ORDER BY date DESC";
$result = $mysqli->query($query);
if ($mysqli->affected_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currentId = $row["id"];
        $method = decrypt($row["method"], $key);

        // Determine row color
        if ($method == "Interested") {
            echo "<tr class='table-warning'>";
        } else if ($method == "Referred") {
            echo "<tr class='table-success'>";
        } else if ($method == "Do Not Contact") {
            echo "<tr class='table-danger'>";
        } else {
            echo "<tr>";
        }
        
        // Format date
        $date = decrypt($row["date"], $key);
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
        echo "<td>" . $month . "/" . $day . "/" . $year . "</td>";

        if ($method != "Interested" && $method != "Referred" && $method != "Do Not Contact") {
            echo "<td>" . $method . "</td>";
            echo "<td>" . decrypt($row["companionship"], $key) . "</td>";
            echo "<td><button type='button' data-bs-target='#editContactModal' data-bs-toggle='modal' data-bs-dismiss='modal' class='btn btn-primary' onclick='";
            echo 'fillEditContactModal($(this).parent().parent()); ';
            echo 'document.getElementById("editContactId").value = "' . $currentId . '"; ';
            echo 'document.getElementById("deleteContactButton").href = "../php/deleteContact.php?id=' . $currentId . '";';
            echo "'><span class='d-none d-md-inline'>Edit&nbsp;&nbsp;</span><i class='bi bi-pencil-fill'></i></button></td>";
        } else {
            echo "<th colspan='3'>" . $method . "</th>";
        }
        echo "</tr>";
    }
}

//Build new contact button row
echo "<tr>";
echo "<td colspan='5'>";
echo "<div class='d-grid'>";
echo "<button type='button' data-bs-target='#newContactModal' data-bs-toggle='modal' data-bs-dismiss='modal' class='btn btn-primary btn-lg' onclick='";
echo 'document.getElementById("newContactId").value = "' . $personId . '";';
echo "'><i class='bi bi-plus'></i></button>";
echo "</div>";
echo "</td>";
echo "</tr>";
?>