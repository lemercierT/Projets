<?php
    require_once "ConnectPDO.class.php";

    class Ajout{
        private $_db;
        private $_id_inf;
        private $_nature;

        function __construct($id_inf, $nature){
            $this->_db = new ConnectPDO();
            $this->_id_inf = $id_inf;
            $this->_nature = $nature;
        }

        function ajoutInf(){
            $array_req = [];
            $id_delit = "";
            $requete = "SELECT delit.id_delit FROM delit WHERE delit.nature = '".$this->_nature."'";
            $array_req = $this->_db->execSQL($requete);
            foreach($array_req as $row){
                if($row["id_delit"]) $id_delit = $row["id_delit"];
            }
            $requete = "INSERT INTO comprend (comprend.id_inf, comprend.id_delit) VALUES(".$this->_id_inf.", ".$id_delit.");";
            $this->_db->execSQL($requete);
        }
    }
?>