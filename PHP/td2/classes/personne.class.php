<?php
    class Personne{
        private $_nom;
        private $_prenom;
        private $_dateDeNaissance;
        private $_sexe;

        function __construct(string $nom, string $prenom, string $dateDeNaissance, string $sexe){
            $this->_nom = $nom;
            $this->_prenom = $prenom;
            $this->_dateDeNaissance = $dateDeNaissance;
            $this->_sexe = $sexe;
        }

        function setNom(string $nom): void{
            $this->_nom = $nom;
        }
        function getNom(): string{
            return $this->_nom;
        }
        function setPrenom(string $prenom): void{
            $this->prenom = $_prenom;
        }
        function getPrenom(): string{
            return $this->_prenom;
        }
        function setDateDeNaissance(string $date_de_naissance): void{
            $this->_dateDeNaissance = $date_de_naissance;
        }
        function getDateDeNaissance(): string{
            return $this->_dateDeNaissance;
        }
        function setSexe(string $sexe): void{
            $this->_sexe = $sexe;
        }
        function getSexe(): string{
            return $this->_sexe;
        }

        function age(): int{
            $current_date = new DateTime(); 
            $personne_date = date_create_from_format("d/m/Y", $this->_dateDeNaissance); 
        
            if($personne_date !== false){
                $age = $current_date->diff($personne_date);
                $year = $age->y;
                return $year;
            }else{
                return -1;
            }
        }

        function __toString(): string{
            return $this->_nom." ".$this->_prenom." ".$this->_dateDeNaissance." ".$this->age()." ans"." ".$this->_sexe;
        }
    }
?>