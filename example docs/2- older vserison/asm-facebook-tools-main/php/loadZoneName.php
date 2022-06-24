<?php
$database = $_GET["database"];

if ($database == "camelback") {
    $zone = "Camelback";
} else if ($database == "maricopa") {
    $zone = "Maricopa";
} else if ($database == "maricopanorth") {
    $zone = "Maricopa North";
} else if ($database == "paradisevalley") {
    $zone = "Paradise Valley";
} else if ($database == "payson") {
    $zone = "Payson";
} else if ($database == "phoenix") {
    $zone = "Phoenix";
} else if ($database == "phoenixeast") {
    $zone = "Phoenix East";
} else if ($database == "roundvalley") {
    $zone = "Round Valley";
} else if ($database == "scottsdalenorth") {
    $zone = "Scottsdale North";
} else if ($database == "showlow") {
    $zone = "Show Low";
} else if ($database == "snowflake") {
    $zone = "Snowflake";
} else if ($database == "whitemountain") {
    $zone = "White Mountain";
}

echo $zone;
?>