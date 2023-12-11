<?php
    require_once "Client.class.php";
    require 'vendor/autoload.php'; 
    use thiagoalessio\TesseractOCR\TesseractOCR;

    class decryptMRZ{
        private $_scanMRZ;
        private $_tesseract;
        private $_imageMRZ;
        private $_text;
        private $array_infos;
        public $_client;

        public function __construct($imageMRZ){
            $this->_imageMRZ = $imageMRZ;
        }

        private function ImageToText(){
            $this->_tesseract = new TesseractOCR($this->_imageMRZ);
            $this->_text = $this->_tesseract->run();
            $this->_text = str_replace([" ", "\n", "%"], "", $this->_text);
        }

        public function decryptInfos(){
            $this->ImageToText();
            $lenght = strlen($this->_text);
            $id = "";
            for($i = 0; $i < 2; $i++){
                if($i < 2) $id .= $this->_text[$i];
                if($id === "ID" && strlen($this->_text) == 72){
                    return $this->IDdecrypt($this->_text);
                }
            }
        }

        private function dateToSQLDate($birthdate){
            $jour = substr($birthdate, 4, 2);
            $mois = substr($birthdate, 2, 2);
            $annee = substr($birthdate, 0, 2);

            $ajust_annee = $annee < 70 ? 2000 + $annee : 1900 + $annee;
            return $ajust_annee."-".$mois."-".$jour;
        }

        private function IDdecrypt($id_card){
            $id_size = strlen($this->_text);
            $id = "";
            $issuing_state = "";
            $lastname = "";
            $document_nb = "";
            $delivery_date = "";
            $name = "";
            $birthdate = "";
            $gender = "";

            for($i = 0; $i <= $id_size; $i++){
                if($i < 2) $id .= $this->_text[$i];
                if($i > 1 && $i < 5) $issuing_state .= $this->_text[$i];
                if($i > 4 && $i < 30) $lastname .= $this->_text[$i];
                if($i > 35 && $i < 40) $delivery_date .= $this->_text[$i];
                if($i > 40 && $i < 59){
                    if(!is_numeric($this->_text[$i])) $name .= $this->_text[$i];
                }
                if($i > 62 && $i < 69) $birthdate .= $this->_text[$i];
                if($i > 69 && $i < 71) $gender .= $this->_text[$i];   
            }

            echo $id." ".$issuing_state." ".$lastname." ".$delivery_date." ".$name." ".$birthdate." ".$gender;

            $lastname = preg_replace(['/[<>]/'], "", $lastname);
            $name = preg_replace(['/[<>]/'], "", $name);
            $birthdate = $this->dateToSQLDate($birthdate);
            return new Client($lastname, $name, $birthdate);
        }
    }
?>