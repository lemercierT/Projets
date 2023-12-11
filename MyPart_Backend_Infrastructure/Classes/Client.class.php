<?php
    require_once "ConnectPDO.class.php";

    class Client{
        protected $_db;
        private $_surname;
        private $_name;
        private $_birth;

        public function __construct($surname, $name, $birth){
            $this->_db = new ConnexionPDO();
            $this->_surname=$surname;
            $this->_name=$name;
            $this->_birth = $birth; 
        }

        public function getSurname(){
            return $this->toLower($this->_surname);
        }

        public function getName(){
            return $this->toLower($this->_name);
        }

        public function getBirth(){
            return $this->_birth;
        }


        private function toLower($input){
            return strtolower($input);
        }

        public function isSurnameMatch(){
            $requete = "SELECT data_api.surname FROM data_api WHERE LOWER(data_api.surname) = :surname";
            $params = array(":surname" => $this->getSurname());
            $array_req = $this->_db->execSQLParam($requete, $params);

            if(!empty($array_req)) return true;

            return false;
        }


        public function isNameMatch(){
            $requete = "SELECT data_api.name FROM data_api WHERE LOWER(data_api.name) = :name";
            $params = array(":name" => $this->getName());
            $array_req = $this->_db->execSQLParam($requete, $params);

            if(!empty($array_req)) return true;

            return false;

        }

        public function isBirthMatch(){
            $requete = "SELECT data_api.birth FROM data_api WHERE LOWER(data_api.surname) = :surname and LOWER(data_api.name) = :name and data_api.birth = :birth";
            $params = array(":surname" => $this->getSurname(), ":name" => $this->getName(), ":birth" => $this->getBirth());
            $array_req = $this->_db->execSQLParam($requete, $params);

            if(!empty($array_req)) return true;

            return false;
        }

        public function nbBirthMatch(){
            $nb_date = 0;
            $requete = "SELECT COUNT(data_api.birth) as nb_date FROM data_api WHERE LOWER(data_api.surname) = :surname and LOWER(data_api.name) = :name";
            $params = array(":surname" => $this->getSurname(), ":name" => $this->getName());
            $array_req = $this->_db->execSQLParam($requete, $params);
            foreach($array_req as $row){
                if($row["nb_date"]) $nb_date = $row["nb_date"];
            }
            return $nb_date;
        }

        public function matchClient(){
            $pourcentage_match = 0;

            if($this->isSurnameMatch()){
                $pourcentage_match += 33;
            }

            if($this->isNameMatch()){
                $pourcentage_match += 33;
            }

            if($this->isBirthMatch()){
                $birthMatches = $this->nbBirthMatch();
                $numBirths = intval($birthMatches);
        
                $birthYearOnly = (substr($this->getBirth(), 5) === '00-00');

                if($numBirths !== 0){
                    $pourcentage_match += (34 / $numBirths);
                }
        
                if($this->isSurnameMatch() && $this->isNameMatch() && $birthYearOnly) {
                    $pourcentage_match -= ((34 / $numBirths)/2);
                }
            }
        
            echo "\n".$this->getSurname()." ".$this->getName()." ".$this->getBirth()." ";
        
            return $pourcentage_match."%";
        }
    }
?>
