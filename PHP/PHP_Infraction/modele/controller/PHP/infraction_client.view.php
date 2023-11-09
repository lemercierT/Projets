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

    ?>
        <table>
            <th>id_inf</th>
            <th>date_inf</th>
            <th>num_immat</th>
            <th>num_permis</th>
            <?php 
                $i = 0;
                foreach ($array_req as $row):
                    $_SESSION["infraction"][$i] = $row;
            ?>
                <tr>
                    <td><?=$row["id_inf"]?></td>
                    <td><?=$row["date_inf"]?></td>
                    <td><?=$row["num_immat"]?></td>
                    <td><?=$row["num_permis"]?></td>
                    <td>
                        <form action="Consulter.view.php" method="post">
                            <input type="hidden" name="index" value="<?=$i?>">
                            <input type="submit" value="Consulter">
                        </form>
                    </td>
                </tr>
            <?php $i++; endforeach;?>
        </table>
</body>
</html>