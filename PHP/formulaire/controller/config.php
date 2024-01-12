<?php
    $source = "mysql:host=localhost; dbname=db_salle";
    $user = "root";
    $password = "";

    try{
        $db_access = new PDO($source, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf-8'));
    }catch(Exception $exception){
        die($exception->$getMessage());
    }
?>