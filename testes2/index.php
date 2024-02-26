<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <label>x:</label>
        <input type="text" name="x" value="<?= $_post["x"];?>">
        <br>
        <label>y:</label>
        <input type="text" name="y">
        <br>
        <label>z:</label>
        <input type="text" name="z">
        <br>
        <input type="submit" value="total">

    </form>
</body>
</html>

<?php

    function js($str){
        echo "<script>{$str}</script>";
        
    };
    

    if($_POST){
        $x = $_POST["x"];
        $y = $_POST["y"];
        $z = $_POST["z"];
        $total = null;

        // $total = abs($x); // retorna o valor absoluto(valor modular)
        // $total = round($x); // retorna o valor arredondado
        // $total = floor($x); // retorna o valor arredondado PARA BAIXO
        // $total = ceil($x); // retorna o valor arredondado PARA CIMA
        // $total = pow($x, $y); // potência -> x^y
        // $total = sqrt($x); // raiz quadrada
        // $total = max($x, $y, $z); // numero maximo. obs: também aceita UM array
        // $total = min($x, $y, $z); // numero mínimo. obs: também aceita UM array
        // $total = pi(); // retorna o valor de pi
        // $total = rand($x, $y); // numero aleatório de x a y.



        echo  $total;
    }


?>