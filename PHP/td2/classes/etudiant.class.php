<?php
    class Etudiant extends Personne{
        private $_arrayGrades;

        function __construct(string $nom, string $prenom, string $dateDeNaissance, string $sexe, array $arrayGrades){
            parent::__construct($nom, $prenom, $dateDeNaissance, $sexe);
            $this->_arrayGrades = $arrayGrades;
        }

        function setArrayGrades(array $arrayGrades){
            $this->_arrayGrades = $arrayGrades;
        }
        function getArrayGrades(): array{
            return $this->_arrayGrades;
        }

        function addNotes(float $note): void{
            array_push($this->_arrayGrades, $note);
        }
        function displayNotes(): void{
            foreach($this->_arrayGrades as $note){
                echo "Note de ".parent::getPrenom()." ".$note."/20"."\n\n<br>";
            }
        }
        function calcul_moyenne(): float{
            $note_max = 0;
            $nbr_notes = 0;
            $moyenne = 0;
            foreach($this->_arrayGrades as $note){
                $note_max+=$note;
                $nbr_notes++;
            }
            if($nbr_notes == 0){
                $moyenne == 0;
                return $moyenne;
            }
            $moyenne = $note_max / $nbr_notes;
            return $moyenne;
            
        }

        function __toString(): string{
            return parent::__toString()."<br>Moyenne de ".parent::getPrenom()." :".$this->calcul_moyenne();
        }
    }
?>