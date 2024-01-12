<?php
    require "./decryptMRZ.class.php";
    require "vendor/autoload.php";
    use thiagoalessio\TesseractOCR\TesseractOCR;

    use CV\Scalar, CV\Size;
    use function CV\{imread, imwrite, rectangle};

    class DetectMRZ{
        private $_img;
        private $_width, $_height;
        private $_x1, $_y1, $_x2, $_y2;
        private $_decryptMRZ;

        function __construct($img){
            $this->_img = $img;
            $get_size = getimagesize($this->_img);
            $size = explode("\"", $get_size[3]);
            $this->_width = $size[1];
            $this->_height = $size[3];
        }

        private function averagePixel($y, $x, $img){
            $moyenne_pixel = ($img->at($y, $x, 0)+$img->at($y, $x, 1)+$img->at($y, $x, 2))/3;
            return $moyenne_pixel;
        }

        public function detectAndCaptureMRZ(){
            $src = imread($this->_img);
            $size_max_y = ($this->_height - ($this->_height / 8));
            $old_pixel = $this->averagePixel(0, $this->_width, $src);

            $min = 0;
            $max = 0;
            for($this->_y1 = $this->_height / 8; $this->_y1 < $this->_height; $this->_y1++){
                $new_pixel = $this->averagePixel($this->_y1, $this->_width / 2, $src);
                if(abs($old_pixel - $new_pixel) > 8){
                    if($min == 0) $min = $this->_y1;
                    $max = $this->_y1;
                }
                $old_pixel = $new_pixel;
            }
            echo $min." ".$max;

            $src2 = imagecrop(imagecreatefromjpeg($this->_img), ["x" => 0, "y" => $min + ($max / 1.5 - $min), "width" => $this->_width, "height" => $this->_height - ($this->_height / 1.5)]);
            imagejpeg($src2, "src2.jpg");
            
            $src = imread("src2.jpg");
            $get_size = getimagesize("src2.jpg");
            $size = explode("\"", $get_size[3]);
            $this->_width = $size[1];
            $this->_height = $size[3];

            for($x = 0; $x < $this->_width; $x++){
                for($y = 0; $y < $this->_height; $y++){
                    if($this->averagePixel($y, $x, $src) < 110){
                        $src->at($y, $x, 0, 0);
                        $src->at($y, $x, 1, 0);
                        $src->at($y, $x, 2, 0);
                    }else if($this->averagePixel($y, $x, $src) > 110){
                        $src->at($y, $x, 0, 255);
                        $src->at($y, $x, 1, 255);
                        $src->at($y, $x, 2, 255);
                    }
                }
            }

            imwrite("src3.jpg", $src);
            $this->_decryptMRZ = new decryptMRZ("src3.jpg");
            echo $this->_decryptMRZ->decryptInfos();
        }
        
    }
?>