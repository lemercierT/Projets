<?php
    require "ConnexionPDO.class.php";
    require "LoginForm.class.php";

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $user = "";

    if(isset($_POST["user"]) && isset($_POST["passwd"])){
        $user = $_POST["user"];
        $passwd = $_POST["passwd"];
        $login = new LoginForm($user, $passwd);
        if($login->existeUtilisateurs()) header("Location: accueil.view.php");
        else echo 2;
    }
?>