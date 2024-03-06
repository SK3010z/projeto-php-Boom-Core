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
        default: echo $date . "<br>";
        
    }
        for($i = 0; $i <10;$i++){
            echo $i . "<br>";
        }

        $comidas = array("maçã","banana","abacaxi","carne","tomate");
        array_push($comidas, "pizza", "queijo"); // novo valor na ultima posição
        array_pop($comidas); // remove o ultimo valor
        array_shift($comidas); // remove o primeiro valor

        $reverso = array_reverse($comidas); // retorna o array inverso

        

        foreach ($comidas as $comida) {
            echo $comida . "<br>";
           
        }
        foreach ($reverso as $comida) {
            echo $comida . "<br>";
           
        };

        $arrayMassa = array(
            "Ceará" => "Fortaleza",
            "Bahia" => "Salvador",
            "São Paulo" => "São Paulo",
            "Amazonia" => "Manaus"
        );
        foreach ($arrayMassa as $key => $value) {
            echo "A capital de {$key} é {$value} <br>";
        }

        $chaves = array_keys($arrayMassa); // RETORNA UM ARRAY COM AS CHAVES
        $chaves = array_values($arrayMassa); // RETORNA UM ARRAY COM OS VALORES
        $chaves = array_flip($arrayMassa); // INVERTE A POHA TODA
        $chaves = array_reverse($arrayMassa); // só inverte as posições
        echo count($arrayMassa); // conta quantos elementos tem


        
    


?>