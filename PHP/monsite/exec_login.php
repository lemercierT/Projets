<?php
    require_once "config.php";

    if(isset($_POST["user"]) && isset($_POST["mdp"])){
        $id = $_POST["user"];
        $mdp = $_POST["mdp"];

        $requete = "SELECT * FROM users WHERE id = '$id' AND pass = '$mdp'";
        $resultat = $bd_access->query($requete);

        if($resultat->num_rows == 1){
            $users = $resultat->fetch_assoc();
            $_SESSION["userID"] = $users["id"];
            $_SESSION["pseudo"] = $users["pseudo"];
            header("Location: connected.php");
        }else{
            header("Location: login.php");
        }
    }

    $bd_access->close();
?>