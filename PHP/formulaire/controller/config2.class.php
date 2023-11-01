<?php
    class Connexion{
        private $_db;

        function __construct(){
            $db_config["SGBD"] = "mysql";
            $db_config["HOST"] = "localhost";
            $db_config["DB_NAME"] = "db_salle";
            $db_config["USER"] = "root";
            $db_config["PASSWORD"] = "";
            try{
                $this->_db = new PDO($db_config["SGBD"].":host=".$db_config["HOST"].";dbname=".$db_config["DB_NAME"], $db_config["USER"], $db_config["PASSWORD"], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                unset($db_config);
            }catch(Exception $exception){
                die($exception->getMessage());
            }
        }
        function getdB(){
            return $this->_db;
        }

        function execSQL(string $req, array $valeurs=[]){
            $exec_req = $this->_db->prepare($req);
            $exec_req->execute($valeurs);
            $valeurs = $exec_req->fetchAll();
        }
    }
?>