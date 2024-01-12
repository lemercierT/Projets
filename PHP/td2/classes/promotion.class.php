<?php
    class Promotion{
        private $_libelle;
        private $_arrayEtd;
        private $_nbrEtd;
        private $_moyennePromo;

        function __construct(string $libelle, array $arrayEtd){
            $this->_libelle = $libelle;
            $this->_arrayEtd = $arrayEtd;
        }

        function setLibelle(string $libelle){
            $this->_libelle = $libelle;
        }
        function getLibelle(): string{
            return $this->_libelle;
        }
        function setArrayEtd(array $arrayEtd){
            $this->_arrayEtd = $arrayEtd;
        }
        function getArrayEtd(): array{
            return $this->_arrayEtd;
        }
        function setNbrEtd(int $nbrEtd) {
            $this->_nbrEtd = $nbrEtd;
        }
        function getNbrEtd(): int {
            return $this->_nbrEtd;
        }
        function setMoyennePromo(float $moyennePromo) {
            $this->_moyennePromo = $moyennePromo;
        }
        function getMoyennePromo(): float {
            return $this->_moyennePromo;
        }

        function addEtudiant(Etudiant $etd): void{
            array_push($this->_arrayEtd, $etd);
        }
        function getEtudiant(string $nom, string $prenom){
            foreach($this->_arrayEtd as $etudiant){
                if($etudiant->getNom() == $nom && $etudiant->getPrenom() == $prenom){
                    echo $etudiant;
                }
            }
        }
        function moyennePromo(): float{
            $total_notes = 0;
            $nbr_notes = 0;
            foreach($this->_arrayEtd as $etudiant){
                foreach($etudiant->getArrayGrades() as $note){
                    $total_notes+=$note;
                    $nbr_notes++;
                }
            }
            $moyenne = $total_notes / $nbr_notes;
            return $moyenne;
        }
    }
?>