<?php
session_start();
$user_ip = "174.26.254.220"; //getenv('REMOTE_ADDR');

$geo = unserialize(file_get_contents("http://geoplugin.net/php.gp?ip="));

$city  = $geo["geoplugin_city"];
$region = $geo["geoplugin_region"];
$country = $geo["geoplugin_countryName"];

$local = "$country, $region, $city"; 
$zone = $_SESSION['zone'];
$logon = $_SESSION['logon'];
$logoff = date("m/d/Y @ g:i:s:A");


$query = "INSERT INTO userLog (id, zone, logon, logoff, location) VALUES (NULL, '$zone', '$logon', '$logoff', '$local')";
$mysqli->query($query);

?>