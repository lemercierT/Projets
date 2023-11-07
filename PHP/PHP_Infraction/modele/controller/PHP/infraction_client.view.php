<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require_once "ConnectPDO.class.php";
    $db = new ConnectPDO();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/infraction_client.css">
    <title>Infractions</title>
</head>
<body>
    <h3>Liste des infractions</h3>

    <?php
        if(isset($_SESSION["num_permis"])) echo "Bonjour, ".$_SESSION["num_permis"]."<br>";
        
        $requete = "SELECT infraction.id_inf, infraction.date_inf, infraction.num_immat, infraction.num_permis FROM infraction WHERE infraction.num_permis = '".$_SESSION["num_permis"]."';";
        $array_req = $db->execSQL($requete);
        echo "<br>";

        foreach($array_req as $row){
            echo $row["id_inf"]." ".$row["date_inf"]." ".$row["num_immat"]." ".$row["num_permis"]."<br>";
        }
    ?>
</body>
</html>