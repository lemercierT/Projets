<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "ConnectPDO.class.php";
    require_once "Conducteur.class.php";

    session_start();

    if(isset($_POST["index"])) $i = $_POST["index"];

    if(isset($_SESSION["infraction"][$i])){
        $infraction = $_SESSION["infraction"][$i];
        $ancien_num_permis = $infraction["num_permis"];
        echo $ancien_num_permis;
    }
    
    if(isset($_POST["date_permis"])) {
        $date_permis = date('Y-m-d', strtotime($_POST["date_permis"]));
        echo $date_permis;

        $conducteur = new Conducteur($ancien_num_permis);
        $conducteur->setDatePermis($date_permis);

        $requete = "UPDATE conducteur
                    SET conducteur.date_permis = '".$conducteur->getDatePermis()."'
                    WHERE conducteur.num_permis = '".$ancien_num_permis."'";

        $db = new ConnectPDO();
        $db->execSQL($requete);
    }
?>