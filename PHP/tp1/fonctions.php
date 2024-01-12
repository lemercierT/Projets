<?php
    function displayArray(array $tab): void{
        foreach($tab as $value){
            echo "\n".$value;
        }
    }

    function stringToArray($separator, $string): array{
        return explode($separator, $string);
    }

    function displayKeyArray($array): void{
        foreach($array as $key => $value){
            echo "<th>".$key."\n</th>";
        }
        echo "<br>";
        foreach($array as $key => $value){
            echo "<tr>\n".$value."\n</tr>";
        }
    }

    function displayArray2(array $array): void{
    }
?>