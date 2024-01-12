<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once "Ajout.class.php";

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>
    <h3>Ajout BdD</h3>

    <?php
        if(isset($_POST["nature"])) $nature = $_POST["nature"];

        $ajout = new Ajout($id_inf, $nature);
        $ajout->ajoutInf();
    ?>
</body>
</html>