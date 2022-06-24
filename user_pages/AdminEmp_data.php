<?php
session_start();
if($_SESSION['user'] == 'admin'){
    include '../Headers/admin_header_emp.php';    
} else {
    include '../Headers/general_header.php';
}
//include '../Headers/general_header.php';
include '../php/dbCon.php';
include '../php/weekRange.php';

$user = trim($_GET['user']);

$sql = "SELECT * FROM time_sheet WHERE email = '$user' ORDER BY date DESC";
$result = $mysqli ->query($sql);
include '../php/downloadData.php';


//$result = $mysqli ->query($sql);
$row = $result -> fetch_assoc();
$name = $_GET['name'];
$name_ = $_GET['name'];


echo "<div class=\"container\">";
echo "<div class=\"card shadow\">";
echo "<div class=\"card-header text-center bg-dark text-white\">";
echo "<h1 class=\"card-title\">$name's Time Sheet</h1>";
echo "</div>";
echo "<table class=\"table\">"; 
//echo "<table class=\"table-responsive\">"; 
echo "<thead>";
echo "<tr>";
echo "<th scope=\"col\">Date</th>";
echo "<th scope=\"col\">Job #</th>";
echo "<th scope=\"col\">Name</th>";
echo "<th scope=\"col\">Code</th>";
echo "<th scope=\"col\">Time In</th>";
echo "<th scope=\"col\">Time Out</th>";
echo "<th scope=\"col\">Hours</th>";
echo "<th scope=\"col\">Notes</th>";
echo "<th scope=\"col\">edit</th>";
echo "<th scope=\"col\">Unlock</th>";
echo "</tr>";


echo "<tbody>";

$total_hours = 0;
$prevWeekNum = 0;


$result = $mysqli ->query($sql);
if ($mysqli->affected_rows > 0) {
    while ($row = $result -> fetch_assoc()) {

        $total_hours += $row['hours'];
        $id = $row['inc'];
        $lock = $row['locked'];

        $name = $row['name'];
        $date = $row['date'];
        $hours = $row['hours'];
        $job = $row['job_num'];
        $job_name = $row['job_name'];
        $code = $row['code'];
        $time_in = $row['time_in'];
        $time_out = $row['time_out'];
        $notes = $row['notes'];

        $ddate = $date;
        $_date = new DateTime($ddate);
        $week = $_date -> format("W");
        $prev_year = $_date -> format("Y");


        $curDate = date("Y-m-d");
        $__date = new DateTime($curDate);
        $curWeek = $__date -> format("W");
        $currYear = date("y") + 2000;

        $curWeekRange = getWeekRange($curWeek, $currYear);
        $prevWeekRange = getWeekRange($week, $prev_year);

        $curWeekStart = $curWeekRange['start_date'];
        $curWeekEnd = $curWeekRange['end_date'];

        $prevWeekStart = $prevWeekRange['start_date'];
        $prevWeekEnd = $prevWeekRange['end_date'];




        if ($week < $prevWeekNum){
            echo "<tr class = \"table-info\">";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\">$prevWeekStart - $prevWeekEnd</th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "</tr>";
        } else if ( $week > $prevWeekNum){
            echo "<tr class = \"table-info\">";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\">$prevWeekStart - $prevWeekEnd</th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "<th scope=\"col\"></th>";
            echo "</tr>";
        }
        $prevWeekNum = $week;        
        
       
        if($curWeek != $week){
            echo "<tr>";
            echo "<th class = \"text-danger\"scope=\"col\">$date</th>";

        } else {
            echo "<tr>";
            echo "<th scope=\"col\">$date</th>";            
        }

        //echo "<tr>";
        //echo "<th scope=\"col\">$date</th>";
        echo "<th scope=\"col\">$job</th>";
        echo "<th scope=\"col\">$job_name</th>";
        echo "<th scope=\"col\">$code</th>";
        echo "<th scope=\"col\">$time_in</th>";
        echo "<th scope=\"col\">$time_out</th>";
        echo "<th scope=\"col\">$hours</th>";
        echo "<th scope=\"col\">$notes</th>";
        echo "<th scope=\"col\"> <a  href = \"editHours.php?name_=$name_&user_=$user&date=$date&hours=$hours&job_num=$job&job_name=$job_name&code=$code&time_in=$time_in&time_out=$time_out&notes=$notes&id=$id\">
        <button type=\"submit\" class=\"btn btn-success btn-sm\"> Edit </button></a></th>";
        if ($lock == 0){
            echo "<th scope=\"col\"> <a href = \"../php/unlock_date.php?unlock=1&id=$id&user=$user&name=$name&lock=1\"><button type=\"submit\" class=\"btn btn-primary btn-sm\"> Unlock </button></a> </th>";
        } else {
            echo "<th scope=\"col\"> <a href = \"../php/unlock_date.php?unlock=1&id=$id&user=$user&name=$name&lock=0\"><button type=\"submit\" class=\"btn btn-primary btn-sm\"> lock </button></a> </th>";
        }
        echo "</tr>";
    }
    echo "<tr>";
    echo "<th scope=\"col\">Total Hours</th>";
    echo "<th scope=\"col\">$total_hours</th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "</tr>";

    echo "<tr>";
    echo "<th scope=\"col\">Current Week #</th>";
    echo "<th scope=\"col\">$curWeek</th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "<th scope=\"col\"></th>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "</div>";

//echo "<a href = \"'.$response.'\" download=\"'$name'sData.csv\"> download </a>";
//$data = mysqli_fetch_all($res, MYSQLI_ASSOC);

//print_r($data);
//this is a test
?>