<?php
    abstract class Figure{
        private $_longeur;
        private $_largeur;
    
        public function setLongeur(int $longeur): void {
            $this->_longeur = $longeur;
        }
        public function getLongeur(): int {
            return $this->_longeur;
        }
        public function setLargeur(int $largeur): void {
            $this->_largeur = $largeur;
        }
        public function getLargeur(): int {
            return $this->_largeur;
        }

        abstract function aire(): int;

    
        
    
    return 0;
}

        
    }
?>