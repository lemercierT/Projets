<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
</head>
<body>
    <h3>Conculter votre Infraction</h3>
    <?php
        if(isset($_POST["index"])){
            $i = $_POST["index"];
    
            if(isset($_SESSION["infraction"][$i])) {
                $infraction = $_SESSION["infraction"][$i];
                $id_inf = $infraction["id_inf"];
                $date_inf = $infraction["date_inf"];
                $num_immat = $infraction["num_immat"];
                $num_permis = $infraction["num_permis"];
    
                echo $id_inf." ".$date_inf." ".$num_immat." ".$num_permis;
            }
        }
    ?>
</body>
</html>