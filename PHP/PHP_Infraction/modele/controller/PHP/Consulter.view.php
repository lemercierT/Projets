<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "Conducteur.class.php";
    require_once "Vehicule.class.php";
    require_once "Infraction.class.php";

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/consulter.css">
    <title>Consultation</title>
</head>
<body>
    <div>
    <h3>Consulter votre Infraction</h3>
    <?php
        if(isset($_POST["index"])){
            $i = $_POST["index"];
    
            if(isset($_SESSION["infraction"][$i])) {
                $infraction = $_SESSION["infraction"][$i];
                $id_inf = $infraction["id_inf"];
                $date_inf = $infraction["date_inf"];
                $num_immat = $infraction["num_immat"];
                $num_permis = $infraction["num_permis"];

                echo "<p>Résumé infraction</p>";
    
                echo "<table>";
                    echo "<td><b>Date Infraction</td>";
                    echo "<td><b>Plaque Infraction</td>";
                    echo "<td><b>Numéro Permis</td>";
                    echo "<tr>";
                        echo "<td>".$date_inf."</td>";
                        echo "<td>".$num_immat."</td>";
                        echo "<td>".$num_permis."</td>";
                    echo "</tr>";
                echo "</table>";
            }
        }

        $conducteur = new Conducteur($num_permis);
        $array_req = [];
        $array_req = $conducteur->getInfos();

        echo "<br>";

        $vehicule = new Vehicule($num_permis);
        $array_req1 = [];
        $array_req1 = $vehicule->getInfos();

        echo "<br>";

        $infraction = new Infraction($id_inf);
        $array_req2 = [];
        $array_req2 = $infraction->getInfos();
    ?>
    </div>
</body>
</html>