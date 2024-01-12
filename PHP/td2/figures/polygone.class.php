<?php
    abstract class Polygone extends Figure{
        private $_nbrCotes;

        function __construct(int $longeur, int $largeur, int $nbrCotes){
            $this->_longeur = $longeur;
            $this->_largeur = $largeur;
            $this->_nbrCotes = $nbrCotes;
        }

        public function setNbrCotes(int $nbrCotes): void {
            $this->_nbrCotes = $nbrCotes;
        }
        public function getNbrCotes(): int {
            return $this->_nbrCotes;
        }

        function aire(): int{}

        function nbrCotes(): int{
            return $this->_nbrCotes;
        }
    }
?>