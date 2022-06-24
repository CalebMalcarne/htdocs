<?php
// DON'T LOSE THIS
// IF IT GETS DELETED, WE CAN'T GET THE DATA BACK

$key = "74d264ac824a697a1d74f383a96c6193f835255e87b7d128c6b40547eb830953";

function encrypt($plaintext, $key) {
    $cipher = "aes-256-gcm";
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, 0, $iv, $tag);
    $ciphertext = bin2hex($ciphertext);
    $iv = bin2hex($iv);
    $tag = bin2hex($tag);
    $data = $ciphertext . " :: " . $iv . " :: " . $tag;

    return $data;
}

function decrypt($data, $key) {
    $cipher = "aes-256-gcm";
    list($ciphertext, $iv, $tag) = explode(" :: ", $data);
    $ciphertext = hex2bin($ciphertext);
    $iv = hex2bin($iv);
    $tag = hex2bin($tag);
    $plaintext = openssl_decrypt($ciphertext, $cipher, $key, 0, $iv, $tag);
    
    return $plaintext;
}

function hashPass($password) {
    $hashed_pass = hash("sha256", $password);
    return $hashed_pass;
}
?>
