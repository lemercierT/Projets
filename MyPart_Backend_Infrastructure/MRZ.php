<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require 'vendor/autoload.php'; 
    require "./Classes/decryptMRZ.class.php";


    $decrypt = new decryptMRZ("./Images/idcard_valid.png");;
    $client = $decrypt->decryptInfos();
    echo $client->matchClient();
?>