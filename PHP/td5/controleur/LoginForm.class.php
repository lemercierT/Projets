<?php
    class LoginForm{
        private $_user;
        private $_passwd;
        private $_db;

        function __construct($user, $passwd){
            $this->_user = $user;
            $this->_passwd = $passwd;
            $this->_db = new ConnexionPDO();
        }

        function existeUtilisateurs(): bool{
            $array_req = [];
            $requete = "SELECT users.id FROM users WHERE users.user = '".$this->_user."' AND users.passwd = '".$this->_passwd."'";
            $array_req = $this->_db->execSQL($requete);
            var_dump($array_req);
            if($array_req !== NULL) return true;
            else return false;

            return false;
        }
    }
?>