<?php
    require_once "ConnectPDO.class.php";

    class Suppression{
        private $_db;
        private $_id_inf;

        function __construct($id_inf){
            $this->_db = new ConnectPDO();
            $this->_id_inf = $id_inf;
        }

        function suppressionInf(){
            $array_req = [];
            $requete = "DELETE FROM infraction WHERE infraction.id_inf = ".$this->_id_inf."";
            $this->_db->execSQL($requete);
        }
    }
?>