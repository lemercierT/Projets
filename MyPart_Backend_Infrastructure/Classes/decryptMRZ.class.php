<?php
    require_once "Client.class.php";
    require 'vendor/autoload.php'; 
    use thiagoalessio\TesseractOCR\TesseractOCR;

    class decryptMRZ{
        private $_tesseract;
        private $_imageMRZ;
        private $_text;
        public $_client;

        public function __construct($imageMRZ){
            $this->_imageMRZ = $imageMRZ;
        }

        private function regexDocID($mrz){
            $fraMRZ = '/^[IDS]{2}[FRA]{3}[A-Z<]{25}[0-9]{6}[0-9]{12}[0-9]{1}[A-Z<]{14}[0-9]{6}[0-9]{1}[MF]{1}[0-9]{1}$/';
            $passportReg = '/^[P<]{2}[A-Z]{3}[A-Z<]{39}[A-Z0-9]{9}[0-9]{1}[A-Z]{3}[0-9]{6}[0-9]{1}[A-Z]{1}[0-9]{6}[0-9]{1}[0-9<]{14}[0-9]{1}[0-9]{1}$/';
            $td1Reg = '/^[I<]{2}[A-Z]{3}[A-Z0-9]{9}[0-9<]{1}[A-Z0-9<]{15}[0-9]{6}[0-9]{1}[MF]{1}[0-9]{6}[0-9]{1}[A-Z]{3}[A-Z0-9<]{11}[0-9]{1}[A-Z0-9<]{30}$/'; 
            $td2Reg = '/^[I<]{2}[A-Z]{3}[A-Z<]{31}[A-Z0-9]{9}[0-9]{1}[A-Z]{3}[0-9]{6}[0-9]{1}[MF]{1}[0-9]{6}[0-9]{1}[A-Z0-9<]{7}[0-9]{1}$/';

            $documentCode = substr($mrz, 0, 1);
            switch($documentCode){
                case "I":
                    if(strlen($mrz) == 72 && substr($mrz, 2, 3) === "FRA") if(preg_match($fraMRZ, $mrz)) return true;
                    else if(strlen($mrz) == 90) if(preg_match($td1Reg, $mrz)) return true;
                    else{
                        if(preg_match($td2Reg, $mrz)) return true;
                    }
                case "P":
                    if(strlen($mrz) == 88) if(preg_match($passportReg, $mrz)) return true;
                case "D":
                    return false;
                    break;
            }
        }

        private function stringReplace($string){
            if($string == null) return $string;
            else{
                $n_string = trim(preg_replace('/[<]/', "", $string));
                return $n_string;
            }
        }

        private function dateToSQLDate($birthdate){
            $jour = substr($birthdate, 4, 2);
            $mois = substr($birthdate, 2, 2);
            $annee = substr($birthdate, 0, 2);

            $ajust_annee = $annee < 30 ? 2000 + $annee : 1900 + $annee;
            return $ajust_annee."-".$mois."-".$jour;
        }

        private function ImageToText(){
            $this->_tesseract = new TesseractOCR($this->_imageMRZ);
            $this->_text = $this->_tesseract->run();
            $this->_text = str_replace([" ", "\n", "%"], "", $this->_text);
        }

        public function decryptInfos(){
            $this->ImageToText();
            $lenght = strlen($this->_text);
            $documentCode = substr($this->_text, 0, 1);
            switch($documentCode){
                case "I":
                    if($lenght == 72 && (substr($this->_text, 2, 3)) == "FRA") return ($this->regexDocID($this->_text)) ? $this->IDFrenchDecrypt($this->_text) : throw new Error("Invalide FRA MRZ");
                    else if($lenght == 90) return ($this->regexDocID($this->_text)) ? $this->IDdecryptTD1($this->_text) : throw new Error("Invalide TD1 MRZ");
                    else return ($this->regexDocID($this->_text)) ? $this->IDdecryptTD2($this->_text) : throw new Error("Invalide TD2 MRZ");
                case "P":
                    return ($this->regexDocID($this->_text)) ? $this->PassportDecrypt($this->_text) : throw new Error("Invalide TD2 MRZ");
                case "D":
                    return ($this->regexDocID($this->_text)) ? $this->IDDriverLicense($this->_text) : throw new Error("Invalide TD2 MRZ");
            }
            
        }

        private function IDFrenchDecrypt($mrz){
            $documentCode1 = substr($mrz, 0, 1);
            $documentCode2 = substr($mrz, 1, 1);
            $issuing_state = substr($mrz, 2, 3);
            $lastname = preg_replace('/[<]/', "", substr($mrz, 5, 25));
            $first_second_name = explode("<<", substr($mrz, 49, 14));
            $firstname = trim($first_second_name[0]);
            $second_name = trim($first_second_name[1]);
            $birthdate = $this->dateToSQLDate(substr($mrz, 63, 6));

            $id["documentCode"] = ($documentCode1 == "I") ? "ID-1" : "Unknown";
            $id["documentCode"] = ($documentCode2 == "R") ? "Residence Card" : "";
            $id["issuing_state"] = $issuing_state;
            $id["lastname"] = $lastname;
            $id["firstname"] = $firstname;
            $id["second_name"] = $second_name;
            $id["birthdate"] = $birthdate;
            

            echo $documentCode1." ".$documentCode2." ".$issuing_state." ".$lastname." ".$firstname." ".$second_name." ".$birthdate;

            return new Client($id["lastname"], $id["firstname"], $id["birthdate"]);
        }

        private function IDdecryptTD1($mrz){
            $documentCode1 = substr($mrz, 0, 1);
            $documentCode2 = substr($mrz, 1, 1);
            $issuing_state = $this->stringReplace(substr($mrz, 2, 3));
            $names = explode("<<", substr($mrz, 60, 30));
            $lastname = $names[0];
            $firstname = $names[1];
            $nationality = $this->stringReplace(substr($mrz, 45, 3));
            $birthdate = $this->dateToSQLDate(substr($mrz, 30, 6));

            $id["documentCode"] = ($documentCode1 == "I") ? "ID-1" : "Unknown";
            $id["documentCode"] = ($documentCode2 == "R") ? "Residence Card" : "";
            $id["issuing_state"] = $issuing_state;
            $id["lastname"] = $lastname;
            $id["firstname"] = $firstname;
            $id["nationality"] = $nationality;
            $id["birthdate"] = $birthdate;
            

            echo $documentCode1." ".$documentCode2." ".$issuing_state." ".$lastname." ".$firstname." ".$birthdate;

            return new Client($id["lastname"], $id["firstname"], $id["birthdate"]);
        }

        private function IDdecryptTD2($mrz){
            $documentCode1 = substr($mrz, 0, 1);
            $documentCode2 = substr($mrz, 1, 1);
            $issuing_state = $this->stringReplace(substr($mrz, 2, 3));
            $names = explode("<<", substr($mrz, 5, 31));
            $lastname = $names[0];
            $firstname = $names[1];
            $nationality = $this->stringReplace(substr($mrz, 46, 3));
            $birthdate = $this->dateToSQLDate(substr($mrz, 49, 6));

            $id["documentCode"] = ($documentCode1 == "I") ? "ID-2" : "Unknown";
            $id["documentCode"] = ($documentCode2 == "R") ? "Residence Card" : "";
            $id["issuing_state"] = $issuing_state;
            $id["lastname"] = $lastname;
            $id["firstname"] = $firstname;
            $id["nationality"] = $nationality;
            $id["birthdate"] = $birthdate;
            

            echo $documentCode1." ".$documentCode2." ".$issuing_state." ".$lastname." ".$firstname." ".$birthdate;

            return new Client($id["lastname"], $id["firstname"], $id["birthdate"]);
        }

        private function PassportDecrypt($mrz){
            $documentCode = substr($mrz, 0, 1);
            $issuing_state = substr($mrz, 2, 3);
            $names = explode("<<", substr($mrz, 5, 39));
            $lastname = $names[0];
            $firstname = $names[1];
            $nationality = $this->stringReplace(substr($mrz, 54, 3));
            $birthdate = $this->dateToSQLDate(substr($mrz, 57, 6));

            $id["documentCode"] = $documentCode;
            $id["issuing_state"] = $issuing_state;
            $id["lastname"] = $lastname;
            $id["firstname"] = $firstname;
            $id["nationality"] = $nationality;
            $id["birthdate"] = $birthdate;

            echo $id["documentCode"]." ".$id["issuing_state"]." ".$id["lastname"]." ".$id["birthdate"]." ".$id["nationality"];

            return new Client($id["lastname"], $id["firstname"], $id["birthdate"]);
        }

        private function IDDriverLicense($mrz){

        }
    }
?>