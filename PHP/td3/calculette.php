<?php
    require_once "exec_calc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./calculette.css">
    <title>Calculette PHP</title>
</head>
<body>
    <div class="all">
        <h3>Calculette</h3>
        <form action="exec_calc.php" method="post" class="formulaire">
        <div class="saisie_entier">
                <h5>Entrer deux entiers : </h5>
                <label for="entier1">Entier 1 : </label>
                <input type="text" name="saisie_ent1" id="ent1">
                <label for="entier2">Entier 2 : </label>
                <input type="text" name="saisie_ent2" id="ent2">
            </div>

            <div class="operation">
                <h5>Faites l'opération de votre choix : </h5>
                <div class="images">
                <div class="plus">
                    <input type="submit" value="Plus" name="send_plus">
                </div>
                <div class="fois">
                    <input type="submit" value="Fois" name="send_fois">
                </div>
                <div class="moins">
                    <input type="submit" value="Moins" name="send_moins">
                </div>
                <div class="divv">
                    <input type="submit" value="Div" name="send_divv">
                </div>
                </div>
                <br>
                <input type="submit" value="Envoyer">

                <?php
                    if($verif_ok){
                        echo "ccccc";
                    }else{
                        echo "ddddd";
                    }
                ?>
            </div>
        </div>
        </form>
</body>
</html>