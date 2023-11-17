<?php
    require_once "ConnectPDO.class.php";

    class Vehicule{
        private $_db;
        private $_num_permis;
        private $_num_immat;
        private $_date_immat;
        private $_modele;
        private $_marque;

        function __construct($num_permis){
            $this->_db = new ConnectPDO();
            $this->_num_permis = $num_permis;
        }

        function getInfos(){
            $array_req = [];
            $requete = "SELECT vehicule.num_immat, vehicule.date_immat, vehicule.modele, vehicule.marque FROM vehicule WHERE vehicule.num_permis = '".$this->_num_permis."'";
            $array_req = $this->_db->execSQL($requete);
            foreach($array_req as $row){
                if($row["num_immat"]) $this->_num_immat = $row["num_immat"];
                if($row["date_immat"]) $this->_date_immat = $row["date_immat"];
                if($row["modele"]) $this->_modele = $row["modele"];
                if($row["marque"]) $this->_marque = $row["marque"];

                echo "<h4>Vehicule</h4>";
                echo "<table>";
                echo "<td><b>Num Immat</td>";
                echo "<td><b>Date Immat</td>";
                echo "<td><b>Modele</td>";
                echo "<td><b>Marque</td>";
                echo "<tr>";
                    echo "<td>".$this->_num_immat."</td>";
                    echo "<td>".$this->_date_immat."</td>";
                    echo "<td>".$this->_modele."</td>";
                    echo "<td>".$this->_marque."</td>";
                echo "</tr>";
                echo "</table>";
            }
        }
    }
?>