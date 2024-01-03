<?php
    require "vendor/autoload.php";
    use thiagoalessio\TesseractOCR\TesseractOCR;

    $url = "http://challenge01.root-me.org/programmation/ch8/";
    $body = file_get_contents($url);
        $array = preg_split('/[,]/', $body);
        $base64 = preg_split('/["]/', $array[1]);
        $imageData = base64_decode($base64[0]);

        $image = imagecreatefromstring($imageData);

        imagepng($image, "res.png");
        var_dump(getimagesize("res.png"));
        $size = getimagesize("res.png");
        $dimensions = explode("\"", $size[3]);
        $width = $dimensions[1];
        $height = $dimensions[3];

        $r_width = $width - 70;
        $r_height = $height - 15;

        $crop = imagecrop($image, ["width" => $r_width, "height" => $r_height, "x" => 70, "y" => 3]);
        imagepng($crop, "res1.png");

        $image = imagecreatefrompng("res1.png");
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_CONTRAST, -60);
        //imagefilter($image, IMG_FILTER_EDGEDETECT);
        imagepng($image, 'image_pretraitee.png');
        $tesseract = new TesseractOCR("image_pretraitee.png");
        $res = $tesseract->run();

        echo $res."\n";

        

        $postData = http_build_query(["cametu" => $res]);
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postData
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);


        if($response === false) echo "Erreur POST";
        else{
            if(preg_match('/[retente]{7}/', $response)){
                echo "error";
            }else{
                echo "YESSS\n".$response;
            }
        }
 
?>
