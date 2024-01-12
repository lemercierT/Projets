<?php
    require "vendor/autoload.php";
    require "/Users/admin/Documents/ProjetsGit/MyPart_Backend_Infrastructure/Classes/decryptMRZ.class.php";
    use thiagoalessio\TesseractOCR\TesseractOCR;

    $tesseract = new decryptMRZ("/Users/admin/Documents/ProjetsGit/MyPart_Backend_Infrastructure/Classes/idcard_valid.jpeg");
    echo $tesseract->decryptInfos();
?>