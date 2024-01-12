<?php
    require_once "./Classes/ConnectPDO.class.php";

    $db = new ConnexionPDO();

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $requete = "SELECT data_login.username FROM data_login WHERE data_login.username = :username AND data_login.password = :password";
        $params = array(":username" => $username, ":password" => $password);
        $array_req = $db->execSQLParam($requete, $params);
        if(empty($array_req)) echo "username or password incorrect.";
        else{
            $response = array(
                "utilisateur" => array(
                    "username" => $username,
                    "password" => $password
                )
            );
    
            echo json_encode($response, JSON_PRETTY_PRINT);
        };
    }
?>