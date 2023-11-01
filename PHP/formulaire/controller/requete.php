<?php
    require_once "config2.class.php";
    require_once "salle.class.php";
    require_once "salleDAO.class.php";

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $db = new Connexion();
    $requete = "SELECT * FROM CONTIENT c WHERE c.qte = '16'";
    $array_req = [];
    $db->execSQL($requete, $array_req);

    //$newSalle = new Salle("F22", "AMPHI", "1");
    $salle = new SalleDAO();
    //$salle->insert($newSalle);

    //$salle->delete("F68");
    $mysalle = new Salle("F55", "salle", "1");
    $salle->update($mysalle);
    $test = $salle->getAll();
    var_dump($test);
?>