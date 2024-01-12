<?php
    class ConnexionPDO{
        private $_db;

        function __construct(){
            $db_config["SGBD"] = "mysql";
            $db_config["HOST"] = "127.0.0.1";
            $db_config["DB_NAME"] = "db_myscanner";
            $db_config["USER"] = "root";
            $db_config["PASSWORD"] = "";
            try{
                $this->_db = new PDO($db_config["SGBD"].":host=".$db_config["HOST"].";dbname=".$db_config["DB_NAME"], $db_config["USER"], $db_config["PASSWORD"], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                unset($db_config);
            }catch(Exception $exception){
                die($exception->getMessage());
            }
        }

        function execSQL($req){
            $valeurs = [];
            $exec_req = $this->_db->prepare($req);
            $exec_req->execute($valeurs);
            $valeurs = $exec_req->fetchAll();
            return $valeurs;
        }

        function execSQLParam($requete, $params){
            $prep_exec = $this->_db->prepare($requete);
            $prep_exec->execute($params);
            return $prep_exec->fetchAll();
        }
    }
?>