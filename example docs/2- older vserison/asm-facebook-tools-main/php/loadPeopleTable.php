<?php
session_start();
include "dbConnect.php";
include "securityAlgos.php";

$query = "SELECT id, name, interested, referred, dnc FROM people ORDER BY id DESC";
$result = $mysqli->query($query);

// Build people rows
if ($mysqli->affected_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currentId = $row["id"];

        // Determine row color
        if ($row["dnc"] == 1) {
            echo "<tr class='table-danger'>";
        } else if ($row["interested"] == 1) {
            echo "<tr class='table-warning'>";
        } else if ($row["referred"] == 1) {
            echo "<tr class='table-success'>";
        } else {
            echo "<tr>";
        }

        // Build name box
        echo "<th><a data-bs-target='#personModal' data-bs-toggle='modal' style='cursor: pointer;' onclick='";
        echo 'loadPersonData("' . $currentId . '"); ';
        echo 'loadHistoryTable("' . $currentId . '"); ';
        echo 'document.getElementById("editPersonId").value = "' . $currentId . '"; ';
        echo 'document.getElementById("deletePersonButton").href = "../php/deletePerson.php?id=' . $currentId . '";';
        echo "'>" . decrypt($row["name"], $key) . "</a></th>";

        // Determine date last contacted
        $query = "SELECT date, companionship FROM history WHERE personid = '$currentId' ORDER BY id ASC";
        $result2 = $mysqli->query($query);

        while ($row2 = $result2->fetch_assoc()) {
            if ($row2["companionship"] != "") {
                $lastContacted = $row2["date"];
            }
        }

        // Format date
        $lastContacted = decrypt($lastContacted, $key);
        $year = substr($lastContacted, 0, 4);
        $month = substr($lastContacted, 5, 2);
        $day = substr($lastContacted, 8, 2);

        echo "<td>" . $month . "/" . $day . "/" . $year . "</td>";

        // Set checkboxes
        if ($row["dnc"] == 1) {
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "int");';
            echo "' disabled></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "ref");';
            echo "' disabled></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "dnc");';
            echo "' checked></td>";
        } else if ($row["interested"] == 1) {
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "int");';
            echo "' checked></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "ref");';
            echo "'></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "dnc");';
            echo "'></td>";
        } else if ($row["referred"] == 1) {
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "int");';
            echo "' checked disabled></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "ref");';
            echo "' checked></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "dnc");';
            echo "' disabled></td>";
        } else {
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "int");';
            echo "'></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "ref");';
            echo "' disabled></td>";
            echo "<td><input type='checkbox' class='form-check-input' onclick='";
            echo 'updateCheck(this, "' . $currentId . '", "dnc");';
            echo "'></td>";
        }
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='5'>No people to display</td>";
    echo "</tr>";
}

// Build new person button row
echo "<tr>";
echo "<td colspan='5'>";
echo "<div class='d-grid'>";
echo "<button type='button' data-bs-toggle='modal' data-bs-target='#newPersonModal' class='btn btn-primary btn-lg'><i class='bi bi-plus'></i></button>";
echo "</div>";
echo "</td>";
echo "</tr>";
?>