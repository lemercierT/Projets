<?php
    require_once "ConnectPDO.class.php";

    class Infraction{
        private $_db;
        private $_id_inf;
        private $_id_delit;
        private $_nature;
        private $_tarif;
        private $_infraction_tab;

        function __construct($id_inf){
            $this->_db = new ConnectPDO();
            $this->_id_inf = $id_inf;
            $requete = "SELECT delit.id_delit, delit.nature, delit.tarif 
                        FROM infraction, comprend, delit 
                        WHERE infraction.id_inf = '".$this->_id_inf."' 
                        AND infraction.id_inf = comprend.id_inf 
                        AND comprend.id_delit = delit.id_delit";
            
            $array_req = $this->_db->execSQL($requete);
        
            foreach($array_req as $row){
                $infraction = [
                    'id_delit' => $row["id_delit"],
                    'nature' => $row["nature"],
                    'tarif' => $row["tarif"]
                ];
                $this->_infraction_tab[] = $infraction;
            }
        }

        function setInfTab($infraction_tab){
            $this->_infraction_tab = $infraction_tab;
        }
        function getInfTab(){
            return $this->_infraction_tab;
        }

        function getInfos(){
            echo "<h4>Delits</h4>";
            echo "<table>";
                echo "<td><b>ID Delit</td>";
                echo "<td><b>Nature Delit</td>";
                echo "<td><b>Montant</td>";
                foreach($this->_infraction_tab as $infraction){
                echo "<tr>";
                    echo "<td>".$infraction['id_delit']."</td>";
                    echo "<td>".$infraction['nature']."</td>";
                    echo "<td>".$infraction['tarif']." € </td>";
                echo "</tr>";
                }
            echo "</table>";
        }
        
    }
?>