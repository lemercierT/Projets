<?php
    require "RecupAPI.class.php";
    require "ConnexionPDO.class.php";

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $recup_api = new RecupAPI("https://gels-avoirs.dgtresor.gouv.fr/ApiPublic/api/v1/publication/derniere-publication-flux-json");
    $array_infos = $recup_api->recupInfos();
?>