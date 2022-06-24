<?php

$raw_curl = $_GET['curl'];
//echo $raw_curl;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $raw_curl);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HEADER, 0);

$output = curl_exec($ch);

if ($output === FALSE){
    echo "cURL Error: " . curl_error($ch);
}

curl_close($ch);

echo ($output);

?>