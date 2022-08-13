<?php 
//session_start();
include "dbCon.php";
session_start();

//$error =  $_GET['err'];
//$sub =  $_GET['sub'];
$user = $_SESSION['user'];

if (isset($_POST["old_password"])) {

    //$user = $_SESSION["user"];
    $old_pass = mysqli_real_escape_string($mysqli, $_POST["old_password"]);
    $new_pass = mysqli_real_escape_string($mysqli, $_POST["new_password"]);
    $re_pass = mysqli_real_escape_string($mysqli, $_POST["re_password"]);

    //$password = hash('sha256', $old_pass);
    echo($user);
    echo($old_pass);
    echo($new_pass);
    echo($re_pass);

    $sql = "SELECT * FROM login WHERE user = '$user' AND pass = '$old_pass' limit 1";
    $result = $mysqli->query($sql);  


    //password validity checking
    if (mysqli_num_rows($result) == 1) {
        if ($new_pass == $re_pass) {
            if ($new_pass != $old_pass) {
                if (strlen($new_pass) >= 8){
                    if (preg_match('/[A-Za-z]/', $new_pass) && preg_match('/[0-9]/', $new_pass)){
                        //$hashed_pass = hashPass($new_pass);
                        $sql = "UPDATE login SET pass = '".$new_pass."' WHERE user = '$user'";
                        $mysqli->query($sql);

                        //$_SESSION["database"] = "logs";
                        //$user_ip = "174.26.254.220"; //getenv('REMOTE_ADDR');
                    
                        $geo = unserialize(file_get_contents("http://geoplugin.net/php.gp?ip="));
                    
                        $city  = $geo["geoplugin_city"];
                        $region = $geo["geoplugin_region"];
                        $country = $geo["geoplugin_countryName"];
                    
                        $local = "$country, $region, $city"; 
                        $zone = $_SESSION['zone'];
                        $time = date("m/d/Y @ g:i:s:A");
                    
                    
                       //$query = "INSERT INTO userLog (id, zone, logon, logoff, location) VALUES (NULL, '$pass_opt password update', '$time', NULL, '$local')";
                       // $mysqli->query($query);

                        echo("Error description: " . $mysqli -> error);   
                        header("Location: ../user_pages/updatepass.php?sub=1&err=0"); 
                    } else {header ("Location: ../user_pages/updatepass.php?err=5&sub=0");} 
                } else { header("Location: ../user_pages/updatepass.php?err=4&sub=0");}
            } else {header("Location: ../user_pages/updatepass.php?err=2&sub=0");}
        } else {header("Location: ../user_pages/updatepass.php?err=1&sub=0");} 
    } else {header("Location: ../user_pages/updatepass.php?err=3&sub=0");}
}
?>