<?php
include 'dbCon.php';

$allData = "";
while($row = $result->fetch_assoc()){
    $allData .= $row['date'] . ',' . $row['job_num'] . ',' . $row['job_name'] . ',' . $row['code'] . ',' . $row['time_in'] . ',' . $row['time_out'] . ',' . $row['hours'] . ',' . $row['notes'] . "\n";
}

$response = "data:text/csv;charset=utf-8,DATE,JOB_NAME,CODE,TIME_IN,TIME_OUT,HOURS,NOTES\n";
$response = $response .= $allData;

echo "<a href = '.$response.' download='test.csv'> test download, FIX </a>"; 

?>