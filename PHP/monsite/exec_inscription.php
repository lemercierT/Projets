<?php
    require_once "config.php";

    if(isset($_POST["users"]) && isset($_POST["mdps"]) && isset($_POST["pseudo"])){
        $id = $_POST["users"];
        $mdp = $_POST["mdps"];
        $pseudo = $_POST["pseudo"];

        $requete = "INSERT INTO users (id, pass, pseudo) VALUES ('$id', '$mdp', '$pseudo')";
        if($bd_access->query($requete) == TRUE){
            header("Location: login.php");
        }else{
            echo "Erreur lors de l'inscription : ".$bd_access->error;
        }
    }

    $bd_access->close();
?>