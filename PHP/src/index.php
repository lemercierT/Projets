<?php
$name = "Olivier";
$name1 = "Sandra";
$sexe = "femme" || "homme";


$couleur_olivier = "rouge";
$couleur_sandra = "bleu";
$tab_chaudes = ["jaune", "orange", "rouge"];
$tab_froides = ["vert", "bleu", "violet"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
</head>
<body>
    <?php
        echo "Bonjour";
        echo "<h1>Bonjour $name</h1>";

        if ($name == "Sandra" && $sexe == "femme") {
            echo "Mme $name\n<br>";
        }elseif ($name == "Olivier" && $sexe == "homme") {
            echo "Mr $name\n<br>";
        }

        echo "Couleur préféré de Olivier : $couleur_olivier<br>";
        echo "Couleur préféré de Sandra : $couleur_sandra<br>";

        foreach ($tab_chaudes as $key => $value) {
            if($value == $couleur_olivier){
                echo "$name prérère les couleurs chaudes<br>";
            }elseif ($value == $couleur_sandra){
                echo "$name1 prérère les couleurs chaudes<br>";
            }
        }

        foreach ($tab_froides as $key => $value) {
            if($value == $couleur_olivier){
                echo "$name prérère les couleurs froides<br>";
            }elseif ($value == $couleur_sandra){
                echo "$name1 prérère les couleurs froides<br>";
            }
        }

        
    ?>
</body>
</html>