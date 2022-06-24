<?php
session_start();
include '../Headers/admin_header.php';
include '../php/dbCon.php';
$user = $_SESSION['user'];

$sql = "SELECT * FROM login";
$result = $mysqli ->query($sql);
$row = $result -> fetch_assoc();

echo "<div class=\"container\">";
echo "<div class=\"card shadow\">";
echo "<div class=\"card-header text-center bg-dark text-white\">";
echo "<h1 class=\"card-title\">Employees</h1>";
echo "</div>";
echo "<table class=\"table\">"; 
echo "<thead>";

if ($mysqli->affected_rows > 0) {
    while ($row = $result -> fetch_assoc()) {
        $email = $row['user'];
        $employee = $row['name'];

        echo "<tr class = \"text-center\">";
        echo "<th> $employee </th>";
        echo "<th>   </th>";
        echo "<th>   </th>";
        echo "<th>   </th>";
        echo "<th>   </th>";
        echo "<th>   </th>";
        echo "<th> <a  href = \"#\">
        <a href = \"\"><button type=\"submit\" class=\"btn btn-success btn-sm\"> Save Permissions </button></a> </th>";
        echo "<th><a  href = \"#\">
        <a href = \"\"><button type=\"submit\" class=\"btn btn-success btn-sm\"> Info </button></a></th>";
        echo "<th>
        <form id=\"privalage\" action='../index.php' method=\"post\">
            <select name=\"zone\" id=\"role\" class=\"form-select\" required>
                <option hidden></option>
                <option>Employee</option>
                <option>Manager</option>
                <option>Finance</option>
                <option>Admin</option>
            </select>
        </form>";
        echo "</th>";
        echo "<th><a  href = \"#\">
        <a href = \"AdminEmp_data.php?user=$email&name=$employee\"><button type=\"submit\" class=\"btn btn-success btn-sm\"> View </button></a></th>";
        echo "</th>";
        
        
    }
}
//echo "<tr>";
//echo "<th scope=\"col\">Employee List</th>";
//echo "</tr>";
//echo "<tbody>";