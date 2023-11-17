<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "Suppression.class.php";

    session_start();

    if(isset($_POST["index"])){
        $i = $_POST["index"];
        if(isset($_SESSION["infraction"][$i])){
            $infraction = $_SESSION["infraction"][$i];
            $id_inf = $infraction["id_inf"];
            $date_inf = $infraction["date_inf"];
            $num_immat = $infraction["num_immat"];
            $num_permis = $infraction["num_permis"];

            echo $id_inf." ".$date_inf." ".$num_immat." ".$num_permis."<br>";
        }
    }

    $suppression = new Suppression($id_inf);
    $suppression->suppressionInf();
?>