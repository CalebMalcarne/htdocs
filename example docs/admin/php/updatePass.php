<?php 
session_start();

$_SESSION["database"] = "signin";
include "../php/dbConnect.php";
include "../php/securityAlgos.php";

$error = mysqli_real_escape_string($mysqli, $_GET['err']);
$sub = mysqli_real_escape_string($mysqli, $_GET['sub']);

if (isset($_POST["zone"])) {

    $zone = mysqli_real_escape_string($mysqli, $_POST["zone"]);
    $raw_pass = mysqli_real_escape_string($mysqli, $_POST["old_password"]);
    $new_pass = mysqli_real_escape_string($mysqli, $_POST["new_password"]);
    $re_pass = mysqli_real_escape_string($mysqli, $_POST["re_password"]);

    $password = hash('sha256', $raw_pass);
    if ($_POST["zone"] == '-Admin-'){
        $sql = "SELECT * FROM zone_signin WHERE user = '-Admin-' AND pass = '".$password."' limit 1";
        $result = $mysqli->query($sql);
        $pass_opt = '-Admin-';
    } else {
        $sql = "SELECT * FROM zone_signin WHERE user = 'zonePass' AND pass = '".$password."' limit 1";
        $result = $mysqli->query($sql);  
        $pass_opt = 'zonePass';   
    }

    //password validity checking
    if (mysqli_num_rows($result) == 1) {
        if ($new_pass == $re_pass) {
            if ($new_pass != $raw_pass) {
                if (strlen($new_pass) >= 8){
                    if (preg_match('/[A-Za-z]/', $new_pass) && preg_match('/[0-9]/', $new_pass)){
                        $hashed_pass = hashPass($new_pass);
                        $sql = "UPDATE zone_signin SET pass = '".$hashed_pass."' WHERE user = '".$pass_opt."'";
                        $mysqli->query($sql);

                        $_SESSION["database"] = "logs";
                        $user_ip = "174.26.254.220"; //getenv('REMOTE_ADDR');
                    
                        $geo = unserialize(file_get_contents("http://geoplugin.net/php.gp?ip="));
                    
                        $city  = $geo["geoplugin_city"];
                        $region = $geo["geoplugin_region"];
                        $country = $geo["geoplugin_countryName"];
                    
                        $local = "$country, $region, $city"; 
                        $zone = $_SESSION['zone'];
                        $time = date("m/d/Y @ g:i:s:A");
                    
                    
                        $query = "INSERT INTO userLog (id, zone, logon, logoff, location) VALUES (NULL, '$pass_opt password update', '$time', NULL, '$local')";
                        $mysqli->query($query);

                        echo("Error description: " . $mysqli -> error);   
                        header("Location: tools.php?sub=1"); 
                    } else {header ("Location: tools.php?err=5");} 
                } else { header("Location: tools.php?err=4");}
            } else {header("Location: tools.php?err=2");}
        } else {header("Location: tools.php?err=1");} 
    } else {header("Location: tools.php?err=3");}
}
?>