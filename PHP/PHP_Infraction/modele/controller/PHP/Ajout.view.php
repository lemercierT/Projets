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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/ajout.css">
    <title>Ajout infraction</title>
</head>
<body>
    <div>
    <h3>Ajout INFRACTION</h3>

    <?php
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

        $value_delit = "";
    ?>

    <form action="Ajout.php" method="post">
                <br>
                        <?php
                            $requete = "SELECT delit.nature, delit.tarif FROM delit";
                            $array_req = [];
                            $array_req = $db->execSQL($requete);
                            foreach($array_req as $row):
                                if($row["nature"]){
                                    if($row["nature"] === "Excès de vitesse") $exces_de_vitesse = $row["nature"];
                                    if($row["nature"] === "Outrage à agent") $outrage_a_agent = $row["nature"];
                                    if($row["nature"] === "Feu rouge grillé") $feu_rouge_grille = $row["nature"];
                                    if($row["nature"] === "Conduite en état d'ivresse") $cond_etat_ivresse = $row["nature"];
                                    if($row["nature"] === "Délit de fuite") $delit_de_fuite = $row["nature"];
                                    if($row["nature"] === "refus de priorité") $refus_de_priorite = $row["nature"];
                                    
                                }
                            endforeach;
                        ?>
                            <input type="radio" name="nature" id="exces" value="<?=$exces_de_vitesse?>">
                            <label for="exces">Excès de vitesse</label>
                            <br>
                            <input type="radio" name="nature" id="outrage" value="<?=$outrage_a_agent?>">
                            <label for="outrage">Outrage à agent</label>
                            <br>
                            <input type="radio" name="nature" id="feu" value="<?=$feu_rouge_grille?>">
                            <label for="feu">Feu rouge grillé</label>
                            <br>
                            <input type="radio" name="nature" id="ivresse" value="<?=$cond_etat_ivresse?>">
                            <label for="ivresse">Conduite en état d'ivresse</label>
                            <br>
                            <input type="radio" name="nature" id="fuite" value="<?=$delit_de_fuite?>">
                            <label for="fuite">Délit de fuite</label>
                            <br>
                            <input type="radio" name="nature" id="refus" value="<?=$refus_de_priorite?>">
                            <label for="refus">Refus de priorité</label>
                            <br>
                            <input type="hidden" name="index" value="<?=$i?>">
                            <label for="nature" id="nature">Nature: </label>
                            <input type="text" name="nature" id="nature_res" value="">
        <button type="submit">Envoyer</button>
    </form>
    </div>
</body>
<script src="./Ajout.js"></script>
</html>