<?php
    require 'vendor/autoload.php'; 
    use thiagoalessio\TesseractOCR\TesseractOCR;

    $createdImage = imagecreatefrompng("tonimage");
    $red_rect = imagecolorallocate($createdImage, 255, 0, 0);
    $image = imagerotate($createdImage, -90, 0);
    imagerectangle($image, 50, 860, 1030, 980, $red_rect);

    imagejpeg($image, "rotated_photo.jpg");

    $validImage = "rotated_photo.jpg";
    $createdImage1 = imagecreatefromjpeg($validImage);
    $validMRZ = imagecreatetruecolor(1000, 180);
    imagecopyresampled($validMRZ, $image, 0, 0, 50, 860, 1000, 270, 1000, 200);
    
    imagepng($validMRZ, "validMRZ.png");

    $tesseract = new TesseractOCR('validMRZ.png');
    echo $tesseract->run();


    imagedestroy($createdImage);
?>