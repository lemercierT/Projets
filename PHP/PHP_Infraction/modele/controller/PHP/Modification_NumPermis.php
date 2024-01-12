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
    
    if(isset($_POST["num_permis"])) $num_permis = $_POST["num_permis"];

    echo $num_permis;

    $conducteur = new Conducteur($ancien_num_permis);
    $conducteur->setNumPermis($num_permis);

    $requete = "UPDATE conducteur
                SET conducteur.num_permis = '".$conducteur->getNumPermis()."'
                WHERE conducteur.num_permis = '".$ancien_num_permis."'";
    
    $requete1 = "UPDATE infraction
                SET infraction.num_permis = '".$conducteur->getNumPermis()."'
                WHERE infraction.num_permis = '".$ancien_num_permis."'";

    $db = new ConnectPDO();
    $db->execSQL($requete);
    $db->execSQL($requete1);

    header("Location: ./infraction_gestionnaire.view.php");
?>