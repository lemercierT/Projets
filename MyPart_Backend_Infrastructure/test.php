<?php
    require_once "./Classes/decryptMRZ.class.php";

    $decrypt = new decryptMRZ("./Images/idcard.png");
    $decrypt->TextToMRZ();
?>
