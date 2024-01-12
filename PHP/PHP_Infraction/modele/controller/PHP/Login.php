<?php
    require_once "ConnectPDO.class.php";

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    session_start();

    $db = new ConnectPDO();

    if(isset($_POST["num_permis"]) && isset($_POST["password"])){
        $num_permis = $_POST["num_permis"];
        $password = $_POST["password"];

        $requete = "SELECT conducteur.num_permis, conducteur.mdp FROM conducteur WHERE conducteur.num_permis = '".$num_permis."' and conducteur.mdp = '".$password."'";
        $array_req = $db->execSQL($requete);
        if($array_req == []) header("Location: login.view.php");
        else if($num_permis == "admin"){
            $_SESSION["num_permis"] = $num_permis;
            header("Location: infraction_gestionnaire.view.php");
        }else{
            $_SESSION["num_permis"] = $num_permis;
            header("Location: infraction_client.view.php");
        }
    }
?>