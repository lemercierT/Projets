<?php
    class Triangle extends Polygone{
        private $_hauteur;

        function __construct(int $longeur, int $largeur, int $nbrCotes, int $hauteur){
            parent::__construct($longeur, $largeur, $nbrCotes);
            $this->_hauteur = $hauteur;
        }

        public function setHauteur(int $hauteur): void {
            $this->_hauteur = $hauteur;
        }
        public function getHauteur(): int {
            return $this->_hauteur;
        }

        function aire(): int{
            return $this->_longeur * $this->_largeur;
        }
    }
?>