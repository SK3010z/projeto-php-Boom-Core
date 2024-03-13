<?php
    $server = "localhost";
    $user = "root";
    $senha = "";
    $dbName = "boomcore";

    // Create connection
    $conn = mysqli_connect($server, $user, $senha,$dbName);

    // Check connection
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    echo "Conexão bem-sucedida";
?>