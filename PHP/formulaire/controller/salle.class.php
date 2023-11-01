<?php
    class Salle{
        private string $_num_salle;
        private string $_libelle;
        private string $_etage;

        function __construct(string $num_salle = "", string $libelle = "", string $etage = ""){
            $this->_num_salle = $num_salle;
            $this->_libelle = $libelle;
            $this->_etage = $etage;
        }

        function setNum(string $num_salle){
            $this->_num_salle = $num_salle;
        }
        function getNum(): string{
            return $this->_num_salle;
        }
        function setLibelle(string $libelle){
            $this->_libelle = $libelle;
        }
        function getLibelle(): string{
            return $this->_libelle;
        }
        function setEtage(string $etage){
            $this->_etage = $etage;
        }
        function getEtage(): string{
            return $this->_etage;
        }
    }
?>