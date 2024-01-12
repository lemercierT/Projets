<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "ConnectPDO.class.php";
    require_once "Conducteur.class.php";
    require_once "Infraction.class.php";

    session_start();

    $db = new ConnectPDO();

    if(isset($_POST["index"])){
        $id_inf = $_POST["index"];
    }

    if(isset($_POST["index_y"])){
        $y = $_POST["index_y"];

        if(isset($_POST["id_delit"])) $id_delit = $_POST["id_delit"];
        if(isset($_POST["nature".$y])) $nature = $_POST["nature".$y];
    }

    $requete = "SELECT delit.id_delit FROM delit WHERE delit.nature = '".$nature."'";
    $array_req = $db->execSQL($requete);
    foreach($array_req as $row){
        if($row["id_delit"]) $new_id_delit = $row["id_delit"];
    }

    $requete = "UPDATE comprend
    SET id_delit = ".$new_id_delit."
    WHERE id_inf = ".$id_inf."
    AND id_delit = ".$id_delit."";
    $array_req = $db->execSQL($requete);
?>