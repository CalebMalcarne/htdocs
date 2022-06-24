<?php
session_start();
include 'dbCon.php';

    $user_ = $_POST['user_'];
    $name_ = $_POST['name_'];

    $user = $_SESSION['user'];
    $name = $_SESSION['name'];




if($_POST['hours']){

    $date = $_POST['date'];
    $hours = $_POST['hours'];
    $job = $_POST['job'];

    $job_name = $_POST['job_name'];
    $code = $_POST['code'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];
    $notes = $_POST['notes'];
    $name = $_SESSION['name'];

    #$add = "INSERT INTO time_sheet (inc, email, date, hours, job_num, name, job_name, code, time_in, time_out, notes)
    # VALUES (NULL, '$user', '$date', '$hours', '$job', '$name', '$job_name', '$code', $time_in', '$time_out', '$notes')";

    $add = "INSERT INTO `time_sheet` (`inc`, `email`, `date`, `hours`, `job_num`, `name`, `job_name`, `code`, `time_in`, `time_out`, `notes`) VALUES (NULL, '$user', '$date', '$hours', '$job', '$name', '$job_name', '$code', '$time_in', '$time_out', '$notes')";
    $mysqli ->query($add) or die(mysqli_error($mysqli));
    //echo $add;
    header("location: ../user_pages/employeeData.php");

}

if ($_POST['update_date']){

    $date = $_POST['update_date'];
    $hours = $_POST['update_hours'];
    $job = $_POST['update_job'];

    $job_name = $_POST['update_job_name'];
    $code = $_POST['update_code'];
    $time_in = $_POST['update_time_in'];
    $time_out = $_POST['update_time_out'];
    $notes = $_POST['update_notes'];
    $id = $_POST['id'];

    //echo "UPDATE time_sheet SET date = $date, hours = $hours, job_num = $job, job_name = $job_name, notes = $notes WHERE inc = $id";
    $update = "UPDATE time_sheet SET date = '$date', hours = '$hours', job_num = '$job', job_name = '$job_name', notes = '$notes', time_in = '$time_in', time_out = '$time_out', code = '$code'  WHERE inc = $id";
    $mysqli ->query($update) or die(mysqli_error($mysqli));

    if($_SESSION['user'] == 'admin'){
        header("location: ../user_pages/AdminEmp_data.php?user=$user_&name=$name_");
    } else {
        header("location: ../user_pages/employeeData.php");;    
    }

}
?>