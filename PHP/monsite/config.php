<?php
    $serveur = "localhost";
    $bd_user = "root";
    $bd_pass = "";
    $bd_tables = "monsitebdd";
    
    $bd_access = new mysqli($serveur, $bd_user, $bd_pass, $bd_tables);
    
    if ($bd_access->connect_error) die("Erreur de connexion à la base de données : " . $bd_access->connect_error);
?>