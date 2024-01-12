<?php
    require_once "login.php";
    require_once "ConnexionPDO.class.php";
    $db = new ConnexionPDO();
    $requete_nom = "SELECT users.nom, users.prénom, users.user FROM users WHERE users.user = 'titi'";
    $array_req = [];
    $array_req = $db->execSQL($requete_nom);
    foreach($array_req as $key => $row){
        echo "NOM: ".$row["nom"]."<br>";
        echo "PRENOM: ".$row["prénom"]."<br>";
        echo "login: ".$row["user"]."<br>";
    }
?>