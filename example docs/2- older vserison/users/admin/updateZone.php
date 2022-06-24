<?php
include "../../php/dbConnect.php";

session_start();
$zone = $_POST["zone"];
if ($zone == "Camelback") {
    $_SESSION["database"] = "camelback";
    $_SESSION["zone_ad"] = "Camelback";
} else if ($zone == "Maricopa") {
    $_SESSION["database"] = "maricopa";
    $_SESSION["zone_ad"] = "Maricopa";
} else if ($zone == "Maricopa North"){
    $_SESSION["database"] = "maricopa_north";
    $_SESSION["zone_ad"] = "Maricopa North";
}

?>