<?php
/*invés de varios ifs e elses, use switch*/
    $date =  date("l");
    $letra = "g";
    switch(strtoupper($letra)){
        case "A": echo "ana"; break;
        case "B": echo "bosco"; break;
        case "C": echo "carlos"; break;
        case "D": echo "dick"; break;
        case "E": echo "eduardo"; break;
        case "F": echo "fodase"; break;

        /*como se fosse o ELSE*/
        default: echo $date;
        

        for($i = 0; $i <50;$i++){
            echo $i;
        }
    }


?>