<?php
    require "classes/personne.class.php";
    require "classes/etudiant.class.php";
    require "classes/promotion.class.php";
    require "figures/figure.class.php";
    require "figures/polygone.class.php";
    require "figures/triangle.class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
</head>
<body>
    <?php
        echo "<br><br>--------------Exercice 1------------------<br><br>";
        $personne = new Personne("GRAND", "Pierre", "20/02/2003", "homme");
        $personne1 = new Personne("PETIT", "Caillou", "07/08/1994", "homme");
        $personne2 = new Personne("MOYEN", "Roche", "20/06/1998", "homme");
        echo $personne."\n<br>".$personne1."\n<br>".$personne2."<br>--------------------------------<br>";
        
        $array = [20, 10, 13.45, 12.24];
        $etudiant = new Etudiant("Lemercier", "Thibault", "01/01/2003", "homme", $array);
        $array1 = [20, 10, 13.45, 12.24];
        $etudiant1 = new Etudiant("Legrand", "Thibault", "01/01/2003", "homme", $array1);
        $array2 = [15, 18, 14.5, 16.8];
        $etudiant2 = new Etudiant("Dupont", "Marie", "15/03/2002", "femme", $array2);

        $array3 = [18, 12, 16, 10, 15, 19, 18.5];
        $etudiant3 = new Etudiant("Humbert", "Romain", "07/03/2011", "homme", $array3);

        echo $etudiant->displayNotes();
        echo $etudiant."<br>";

        $arrayEtd = [];
        $promotion = new Promotion("BUT 2 Parcours DACS", $arrayEtd);
        $promotion->addEtudiant($etudiant);
        $promotion->addEtudiant($etudiant1);
        $promotion->addEtudiant($etudiant2);
        $promotion->addEtudiant($etudiant2);
        $promotion->addEtudiant($etudiant2);
        $promotion->addEtudiant($etudiant3);

        echo "<br>-------------------------<br><br>";
    ?>
    <table>
        <?php
            echo $promotion->getLibelle();
        ?>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Sexe</th>
        <th>Moyenne</th>
        <?php
            foreach($promotion->getArrayEtd() as $etudiant){
                echo "<tr>";
                echo "<td>".$etudiant->getNom()."</td>";
                echo "<td>".$etudiant->getPrenom()."</td>";
                echo "<td>".$etudiant->age()."</td>";
                echo "<td>".$etudiant->getSexe()."</td>";
                echo "<td>".$etudiant->calcul_moyenne()."</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan=\"4\">Moyenne de la Promotion</td>";
            echo "<td>".$promotion->moyennePromo()."</td>";
            echo "</tr>";
        ?>
    </table>
    <?php
        echo "<br>----------------------------<br><br>";
        echo $promotion->getEtudiant("Lemercier", "Thibault");

        echo "<br><br>--------------Exercice 2------------------<br><br>";
        $triangle = new Triangle(5, 10, 3, 7);
        echo "Triangle : <br>base =".$triangle->getLongeur();
    ?>
</body>
</html>