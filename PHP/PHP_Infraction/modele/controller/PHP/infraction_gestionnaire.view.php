<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "ConnectPDO.class.php";
    $db = new ConnectPDO();

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/infraction_gestionnaire.css">
    <title>Infraction moderateur</title>
</head>
<body>
    <div>
    <h3>Liste des infractions / Page administrateur</h3>

    <?php
        if(isset($_SESSION["num_permis"])) echo "<p>Bonjour, ".$_SESSION["num_permis"]."</p>";
    ?>

    <h4>Liste des infractions</h4>
    <table>
    <td><b>id_inf</td>
    <td><b>date_inf</td>
    <td><b>num_immat</td>
    <td><b>num_permis</td>
    <td id="action"><b>Actions</td>
    <?php 
        $requete = "SELECT * FROM infraction";
        $array_req = $db->execSQL($requete);
        $i = 0;
        foreach($array_req as $row):
            $_SESSION["infraction"][$i] = $row;
    ?>
        <tr>
            <td><?=$row["id_inf"]?></td>
            <td><?=$row["date_inf"]?></td>
            <td><?=$row["num_immat"]?></td>
            <td><?=$row["num_permis"]?></td>
            <td id="action"><form action="Ajout.view.php" method="post"><button type="submit" value="ajout" id="ajout<?=$i?>"><img src="../vue/images/ajout.png"/><input type="hidden" name="index" value="<?=$i?>"></button></form></td>
            <td><form action="Modification.view.php" method="post"><button type="submit" value="modification" id="modification<?=$i?>"><img src="../vue/images/modifier.png"/><input type="hidden" name="index" value="<?=$i?>"></button></form></td>
            <td><form action="Suppression.view.php" method="post"><button type="submit" value="suppresion" id="suppression<?=$i?>"><img src="../vue/images/delete.png"/><input type="hidden" name="index" value="<?=$i?>"></button></form></td>
            <td><form action="Consulter.view.php" method="post"><button type="submit" value="Consulter" id="consulter<?=$i?>"><img src="../vue/images/consulter.png"><input type="hidden" name="index" value="<?=$i?>"></button></form></td>
        </tr>
    <?php $i++; endforeach;?>
</table>

    </div>
</body>
<script src="./main.js"></script>
</html>