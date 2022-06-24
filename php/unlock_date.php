<?php
include "dbCon.php";

$user = $_GET['user'];
$name = $_GET['name'];
$id = $_GET['id'];
$lockState = $_GET['lock'];

//$update = "UPDATE time_sheet SET date = '$date', hours = '$hours', job_num = '$job', job_name = '$job_name', notes = '$notes', time_in = '$time_in', time_out = '$time_out', code = '$code'  WHERE inc = $id";
$update = "UPDATE time_sheet SET locked = $lockState WHERE inc = $id";
$mysqli ->query($update) or die(mysqli_error($mysqli));
header("location: ../user_pages/AdminEmp_data.php?user=$user&name=$name");
?>