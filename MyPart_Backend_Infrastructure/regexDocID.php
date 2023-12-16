<?php
    require "vendor/autoload.php";
    use thiagoalessio\TesseractOCR\TesseractOCR;

    $tesseract = new TesseractOCR("./images/idcard_valid.jpeg");
    $id = $tesseract->run();


    $IDFRA = "IDFRALEMERCIER<<<<<<<<<<<<<<<<0570421811579505934THIBAULT<<DANI0302209M1";
    $test = "   IDFRAL  EMERCIER<<<<<<  <<<<<<<<<  <0570421811  579505934THIBAULT<<DANI  0302209M1   ";

    $fraMRZ = '/^[IDS]{2}[FRA]{3}[A-Z<]{25}[0-9]{6}[0-9]{12}[0-9]{1}[A-Z<]{14}[0-9]{6}[0-9]{1}[MF]{1}[0-9]{1}$/';

    $id = preg_replace(['/[ ]/', '/[\n]/'], "", $test);
    echo strlen($IDFRA);

    if(preg_match($fraMRZ, trim($id))){
        echo "La chaîne MRZ est valide pour le format français.\n";
    }else{
        echo "La chaîne MRZ n'est pas valide pour le format français.\n";
    }

    
    $passport = "P<FRALEMERCIER<<KATIA<VERONIQUE<MARIE<LOU<<<21ED028930FRA7703182F3112076<<<<<<<<<<<<<<02";
    $test = "P <  FRAL  EME  RCIER<<KA  TIA  <VERONI  QUE<MARI  E<LOU<<<21ED  0289  30FR   A7703182F3112076<   <<<<<<<<<<<<<02";
    $passportReg = '/^[P<]{2}[A-Z]{3}[A-Z<]{39}[A-Z0-9]{9}[0-9]{1}[A-Z]{3}[0-9]{6}[0-9]{1}[A-Z]{1}[0-9]{6}[0-9]{1}[0-9<]{14}[0-9]{1}[0-9]{1}$/';

    $test = preg_replace('/[ ]/', "", $test);
    echo strlen($passport);

    if(preg_match($passportReg, trim($test))){
        echo "La chaîne MRZ est valide pour le passeport.\n";
    }else{
        echo "La chaîne MRZ n'est pas valide pour le passeport.\n";
    }

    $td1 = "I<UTOD23145890<1233<<<<<<<<<<<7408122F1204159UTO<<<<<<<<<<<6ERIKSSON<<ANNA<MARIA<<<<<<<<<<";
    $test = "I<UTOD23145   890<123   3<<<<<<<   <<<<740812  2F120   4159UTO<  <<< <<<<<<<6  ERIKSS ON <<ANNA<MARIA<<<<  << <<<<";
    $td1Reg = '/^[I<]{2}[A-Z]{3}[A-Z0-9]{9}[0-9<]{1}[A-Z0-9<]{15}[0-9]{6}[0-9]{1}[MF]{1}[0-9]{6}[0-9]{1}[A-Z]{3}[A-Z0-9<]{11}[0-9]{1}[A-Z0-9<]{30}$/';    

    $test = preg_replace('/[ ]/', "", $test);
    echo strlen($td1);

    if(preg_match($td1Reg, trim($test))){
        echo "La chaîne MRZ est valide pour le TD1.\n";
    }else{
        echo "La chaîne MRZ n'est pas valide pour le TD1.\n";
    }

    $td2 = "I<UTOERIKSSON<<ANNA<MARIA<<<<<<<<<<<D231458906UTO7408122F1204159<<<<<<<6";
    $test = " I < UT  OE  RIK  SSO N<<  ANNA<  MARIA<   <<<  <<<<<  <<D  23145 8905  UTO74  081  22F  1204  159  <<<<<<  <6";
    $td2Reg = '/^[I<]{2}[A-Z]{3}[A-Z<]{31}[A-Z0-9]{9}[0-9]{1}[A-Z]{3}[0-9]{6}[0-9]{1}[MF]{1}[0-9]{6}[0-9]{1}[A-Z0-9<]{7}[0-9]{1}$/';

    $test = preg_replace('/[ ]/', "", $test);
    echo strlen($td2);

    if(preg_match($td2Reg, trim($test))){
        echo "La chaîne MRZ est valide pour le TD2.\n";
    }else{
        echo "La chaîne MRZ n'est pas valide pour le TD2.\n";
    }
?>
