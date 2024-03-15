<?php
    $server = "localhost";
    $user = "root";
    $senha = "";
    $dbName = "boomcore";

    // Create connection
    try{
        $conn = mysqli_connect($server, $user, $senha,$dbName);

    }
    catch(null){
    }
    

    // Check connection
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    echo "Conexão bem-sucedida";
?>