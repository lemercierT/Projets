<?php
    require 'vendor/autoload.php'; 
    use thiagoalessio\TesseractOCR\TesseractOCR;

    $ocr = new TesseractOCR();
    $ocr->image('./Images/idcard_valid.png');
    echo $ocr->run();
?>