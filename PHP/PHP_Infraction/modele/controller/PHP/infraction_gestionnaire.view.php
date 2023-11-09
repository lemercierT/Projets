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
    <title>Infraction moderateur</title>
</head>
<body>
    <h3>Liste des infractions / Page administrateur</h3>

    <?php
        if(isset($_SESSION["num_permis"])) echo "Bonjour, ".$_SESSION["num_permis"]."<br>";
    ?>

    <h4>Liste des infractions</h4>
    <table>
    <th>id_inf</th>
    <th>date_inf</th>
    <th>num_immat</th>
    <th>num_permis</th>
    <?php 
        $requete = "SELECT * FROM infraction";
        $array_req = $db->execSQL($requete);
        $i = 0;
        foreach($array_req as $row):
    ?>
        <tr>
            <td><?=$row["id_inf"]?></td>
            <td><?=$row["date_inf"]?></td>
            <td><?=$row["num_immat"]?></td>
            <td><?=$row["num_permis"]?></td>
            <td><form action="Ajout.view.php" method="post"><input type="submit" value="ajout" id="ajout<?=$i?>"></form></td>
            <td><form action="Modification.view.php" method="post"><input type="submit" value="modification" id="modification<?=$i?>"></form></td>
            <td><form action="Supression.view.php" method="post"><input type="submit" value="suppresion" id="suppression<?=$i?>"></form></td>
        </tr>
    <?php $i++; endforeach;?>
</table>


</body>
<script src="./main.js"></script>
</html>