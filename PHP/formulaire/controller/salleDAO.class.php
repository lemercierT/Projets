<?php
    require_once "config2.class.php";
    require_once "salle.class.php";

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    class SalleDAO{
        private $_db;
        private $_select;

        function __construct(){
            $this->_db = new Connexion();
            $this->_select = "SELECT * FROM SALLE";
        }

        function insert(Salle $salle): void{
            $query = "INSERT INTO SALLE (num_salle, lib_salle, etage) VALUES (:num, :libelle, :etage)";
            $this->_db->execSQL($query, 
            [":num"=>$salle->getNum(), ":libelle"=>$salle->getLibelle(), ":etage"=>$salle->getEtage()]);
        }
        function insert_double(Salle $salle): void{
            $query = "INSERT INTO SALLE (num_salle, lib_salle, etage) VALUES (:num, :libelle, :etage)";
            $bd_connect = $this->_db->getdB()->prepare($query);
            
            $bd_connect->bindParam(':num', $salle->getNum());
            $bd_connect->bindParam(':libelle', $salle->getLibelle());
            $bd_connect->bindParam(':etage', $salle->getEtage());

            $bd_connect->execute();
        }

        function delete(string $num_salle): void{
            $query = "DELETE FROM SALLE WHERE num_salle = :num_salle";
            $this->_db->execSQL($query, 
            [":num_salle"=>$num_salle]);
        }

        function update(Salle $salle): void{
            $query = "UPDATE SALLE SET lib_salle = :lib_salle, etage = :etage WHERE num_salle = :num_salle";
            $this->_db->execSQL($query, 
            [":num_salle"=>$salle->getNum(), ":lib_salle"=>$salle->getLibelle(), ":etage"=>$salle->getEtage()]);
        }

        private function loadQuery(array $result): array{
            $salles = [];
            foreach($result as $row){
                $salle = new Salle();
                $salle->setNum($row["num_salle"]);
                $salle->setLibelle($row["lib_salle"]);
                $salle->setEtage($row["etage"]);
                array_push($salles, $salle);
            }
            return $salles;
        }

        function getAll(): array{
            return ($this->loadQuery($this->_db->execSQL($this->_select)));
        }

    }
?>