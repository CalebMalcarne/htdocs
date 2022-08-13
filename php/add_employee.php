<?php 
include "dbCon.php";

if($_POST['emp_name']){

    $name = $_POST['emp_name'];
    $age = $_POST['age'];
    $start_date = $_POST['start_date'];

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $pay_rate = $_POST['pay'];
    


    $add = "INSERT INTO `employee_data` (`ID`, `name`, `age`, `phone`, `email`, `position`, `employment_start`, `pay_rate`) VALUES 
    (NULL, '$name', '$age','$phone', '$email', '$position', '$start_date', '$pay_rate')";
    $mysqli ->query($add) or die(mysqli_error($mysqli));

    $add = "INSERT INTO `login` (`ID`, `user`, `pass`, `name`, `perms`) VALUES 
    (NULL, '$email', '$password','$name', 1)";
    $mysqli ->query($add) or die(mysqli_error($mysqli));


    header("location: ../user_pages/adminData.php");

}
?>