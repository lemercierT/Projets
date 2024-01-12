<?php
require "fonctions.php";

$name = "Olivier";
$tab_2people = ["Olivier" => "Homme", 
                "Sandra" => "Femme"];
$tab_2peopleColor = ["Olivier" => "Rouge",
                     "Sandra" => "Bleu"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1/PHP</title>
</head>
<body>
    <?php
        echo "<h1>Bonjour $name</h1><br>----------------------------<br><br>";

        foreach($tab_2people as $key => $value){
            if($value == "Homme"){
                echo "Bonjour Mr $key<br>";
            }elseif($value == "Femme"){
                echo "Bonjour Mme $key<br><br>";
            }
        }

        echo "----------------------------<br><br>";

        $string_hot = "Vous aimez les couleurs chaudes !";
        $string_cold = "Vous aimez les couleurs froides !";
        $default = "Couleur non enregistrée dans le programme...";
        foreach ($tab_2peopleColor as $key => $value) {
            switch ($value) {
                case "Rouge":
                case "Jaune":
                case "Orange":
                    echo $string_hot." ".$value."<br>";
                    break;
                case "Bleu":
                case "Violet":
                case "Gris":
                    echo $string_cold." ".$value."<br>";
                    break;
                default:
                    echo "$default<br>";
            }
        }

        echo "<br>----------------------------<br><br>";

        for($i = 0; $i < 11; $i++){
            if(($i % 2 == 0) && ($i % 3 == 0)){
                echo "$i est divisible par 2 et 3<br>";
            }elseif(($i % 2 == 0) && ($i % 3 != 0)){
                $reste = $i / 2;
                echo $i."est divisble par 2 (2*".$reste.")<br>";
            }elseif(($i % 2 != 0) && ($i % 3 == 0)){
                $reste = $i / 3;
                echo $i."est divisble par 3 (3*".$reste.")<br>";
            }
        }

        echo "<br>----------------------------<br><br>";

        $entier = 10;
        $max = 50;
        for($i = $entier; $i < $max; $i*=2){
            echo "nb = ".$entier."\n:\n".$i."<br>";
        }

        echo "<br>----------------------------<br><br>";

        $entier10 = [1, 2, 3, 4, 5, 6 ,7 ,8, 9, 10];
        foreach($entier10 as $value){
            echo $value."\n";
        }

        echo "<br>";

        $tabentier50 = [];
        $max = 50;
        for($i = 0; $i < $max; $i++){
            array_push($tabentier50, $i);
        }

        for($i = 0; $i < count($tabentier50); $i++){
            if($i % 10 == 0) echo "<br>";
            echo $i."\n";
        }

        echo "<br>----------------------------<br><br>";
    ?>

    <?php
        $personnages = [["id_pers" => 1, "nom" => "Skywalker", "prenom" => "Luke"], 
                        ["id_pers" => 2, "nom" => "R2D2", "prenom" => "Droid"]];
    ?>

    <h3>Liste des personnages Star Wars : </h3>
    <table>
        <thead>
            <th>id_pers</th>
            <th>nom</th>
            <th>prenom</th>
        </thead>

        <tbody>
            <?php
                foreach($personnages as $perso): ?>
                    <tr>
                        <td><?php echo $perso["id_pers"];?></td>
                        <td><?php echo $perso["nom"];?></td>
                        <td><?php echo $perso["prenom"];?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        <br>----------------------------<br><br>

    <?php
        $panier = ["Banane", "Tomate", "Fraise"];
        array_push($panier, "Cerise");
        array_unshift($panier, "Kiwi"); //Ajoute élément début de tableau.
    ?>

    <table>
        <?php
            foreach($panier as $fruit): ?>
                <tr>
                    <?php echo "\n".$fruit; ?>
                </tr>
        <?php endforeach; ?>
    </table>

    <br><br>

    <table>
        <?php
            foreach($panier as $key => $fruit): ?>
            <tr>
                <?php echo "<td>".$key."\n".$fruit."</td>"; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>----------------------------<br><br>

    <?php
        $achats = ["Fruits" => ["Kiwi", "Banane", "Tomate", "Fraise", "Cerise"],
                    "Légumes" => ["Courgette", "Concombre", "Haricot vert"]];
        $first = $achats["Fruits"][0];
        $last = $achats["Légumes"][count($achats)];
        echo "Premier fruit : ".$first."<br><br>"."Dernier légume : ".$last;
    ?>

    <br>----------------------------<br><br>

    <?php
        foreach($achats as $categ => $produits): ?>
            <?php echo "<br>".$categ.":<br>";?>
            <?php 
                foreach($produits as $key => $prod): ?>
                    <?php echo $key."\n:\n".$prod."<br>"; ?>
            <?php endforeach; ?>
    <?php endforeach; ?>

    <br>----------------------------<br><br>

    <?php
        displayArray($panier);
        echo "<br><br>";
        displayArray($entier10);
    ?>

    <br>----------------------------<br><br>

    <?php
        $maString = "Hi, how are you today ?";
        $myArray = stringToArray(" ", $maString);
        foreach($myArray as $value){
            echo "<br>".$value;
        }
    ?>

    <br>----------------------------<br><br>
    <?php
        $tabFruits = ["Melon", "Pomme", "Poire"];
        displayKeyArray($tabFruits);
    ?>

</body>
</html>