<?php
    $verif_ok = false;

    if(isset($_POST["saisie_ent1"]) && isset($_POST["saisie_ent2"])){
        $entier1 = $_POST["saisie_ent1"];
        $entier2 = $_POST["saisie_ent2"];
        $ent1 = intval($entier1);
        $ent2 = intval($entier2);

        switch(true){
            case $_POST["send_plus"]:
                echo "<div>".$ent1 + $ent2."</div>";
                break;
            case $_POST["send_fois"]:
                echo $ent1 * $ent2;
                break;
            case isset($_POST["send_moins"]):
                echo $ent1 - $ent2;
                break;
            case isset($_POST["send_divv"]):
                if(isset($_POST["send_divv"]) && ($ent1 == 0 || $ent2 == 0)){
                    $verif_ok = true;
                }else{
                    echo $ent1 / $ent2;
                }
                break;
        }
    }
?>