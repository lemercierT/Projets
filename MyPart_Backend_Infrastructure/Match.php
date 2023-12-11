<?php
    require_once "./Classes/Client.class.php";

    if(isset($_POST["lastname"]) && isset($_POST["name"]) && isset($_POST["birth"])){
        $lastname = $_POST["lastname"];
        $name = $_POST["name"];
        $birth = ($_POST["birth"] !== null) ? $_POST["birth"] : "00-00-0000";

        $client = new Client($lastname, $name, $birth);
        $taux_match = $client->matchClient();

        echo "<br>".$taux_match."%";
    }
?>
