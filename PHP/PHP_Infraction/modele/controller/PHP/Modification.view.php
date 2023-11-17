<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "Conducteur.class.php";
    require_once "Infraction.class.php";

    session_start();

    if(isset($_POST["index"])){
        $i = $_POST["index"];

        if(isset($_SESSION["infraction"][$i])) {
            $infraction = $_SESSION["infraction"][$i];
            $id_inf = $infraction["id_inf"];
            $date_inf = $infraction["date_inf"];
            $num_immat = $infraction["num_immat"];
            $num_permis = $infraction["num_permis"];
        }
    }

    $conducteur = new Conducteur($num_permis);
    $infraction = new Infraction($id_inf);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification infraction</title>
</head>
<body>
    <h3>Modification INFRACTION</h3>

    <div class="conducteur">
        <form action="Modification_NumPermis.php" method="post">
            <label for="num_permis">Numéro permis: </label>
            <input type="text" name="num_permis" id="num_permis" value=<?=$conducteur->getNumPermis()?>>
            <input type="hidden" name="index" value="<?=$i?>">
            <input type="submit" value="Envoyer">
        </form>
        <br>
        <form action="Modification_DatePermis.php" method="post">
            <label for="date_permis">Date permis: </label>
            <input type="text" name="date_permis" id="date_permis" value=<?=$conducteur->getDatePermis()?>>
            <input type="hidden" name="index" value="<?=$i?>">
            <input type="submit" value="Envoyer">
        </form>
        <br>
        <form action="Modification_Nom.php" method="post">
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" value=<?=$conducteur->getNom()?>>
            <input type="hidden" name="index" value="<?=$i?>">
            <input type="submit" value="Envoyer">
        </form>
        <form action="Modification_Prenom.php" method="post">
            <label for="prenom">Prenom: </label>
            <input type="text" name="prenom" id="prenom" value=<?=$conducteur->getPrenom()?>>
            <input type="hidden" name="index" value="<?=$i?>">
            <input type="submit" value="Envoyer">
        </form>
        <br>
    </div>


    <div class="delit">
        <table>
            <th><b>ID Delit</th>
            <td><b>Nature Delit</td>
            <td><b>Montant</td>
            <?php
            $y = 0;
                $infraction_tab = $infraction->getInfTab();
                foreach($infraction_tab as $row):
            ?>
            <form action="Modification_Delit.php" method="post">
            <tr>
                <td><?=$row["id_delit"]?><input type="hidden" name="id_delit" value="<?=$row["id_delit"]?>"></td>
                <td><input type="text" name="nature<?=$y?>" id="nature<?=$y?>" value="<?=$row["nature"]?>"></td>
                <td><?=$row["tarif"]?></td>
                <td><input type="submit" value="Modifier"><input type="hidden" name="index" value="<?=$i + 1?>"><input type="hidden" name="index_y" value="<?=$y?>"></td>
            </tr>
            </form>
            <?php $y++; endforeach;?>
        </table>
    </div>
    </form>
</body>
</html>