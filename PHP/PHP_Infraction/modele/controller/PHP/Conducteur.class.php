<?php
    require_once "ConnectPDO.class.php";

    class Conducteur{
        private $_db;
        private $_num_permis;
        private $_date_permis;
        private $_nom;
        private $_prenom;

        function __construct($num_permis){
            $this->_db = new ConnectPDO();
            $this->_num_permis = $num_permis;
            $requete = "SELECT conducteur.num_permis, conducteur.date_permis, conducteur.nom, conducteur.prenom FROM conducteur WHERE conducteur.num_permis = '".$this->_num_permis."'";
            $array_req = $this->_db->execSQL($requete);

            foreach($array_req as $row){
                if($row["num_permis"]) $this->_num_permis = $row["num_permis"];
                if($row["date_permis"]) $this->_date_permis = $row["date_permis"];
                if($row["nom"]) $this->_nom = $row["nom"];
                if($row["prenom"]) $this->_prenom = $row["prenom"];
            }
        }

        function setNumPermis($num_permis){
            $this->_num_permis = $num_permis;
        }
        function getNumPermis(){
            return $this->_num_permis;
        }

        function setDatePermis($date_permis){
            $this->_date_permis = $date_permis;
        }
        function getDatePermis(){
            return $this->_date_permis;
        }

        function setNom($nom){
            $this->_nom = $nom;
        }
        function getNom(){
            return $this->_nom;
        }

        function setPreNom($prenom){
            $this->_prenom = $prenom;
        }
        function getPreNom(){
            return $this->_prenom;
        }

        function getInfos(){
            $array_req = [];

                echo "<h4>Conducteur</h4>";
                echo "<table>";
                echo "<td><b>Num Permis</td>";
                echo "<td><b>Date Permis</td>";
                echo "<td><b>Nom</td>";
                echo "<td><b>Prenom</td>";
                echo "<tr>";
                    echo "<td>".$this->_num_permis."</td>";
                    echo "<td>".$this->_date_permis."</td>";
                    echo "<td>".$this->_nom."</td>";
                    echo "<td>".$this->_prenom."</td>";
                echo "</tr>";
                echo "</table>";
        }
    }
?>