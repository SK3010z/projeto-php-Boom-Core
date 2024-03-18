<?php
    // $server = "localhost";
    // $user = "root";
    // $senha = "";
    // $dbName = "boomcore";
    // $conn = mysqli_connect($server, $user, $senha, $dbName);
    $con = mysqli_connect("localhost","root","","boomcore");
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }

    $sql = "SELECT * FROM contas";
    $result = mysqli_query($con, $sql);

    // Associative array

    O WHILE TBM PERCORRE UM ARRAY ASSOCIATIVO
    while($row = mysqli_fetch_assoc($result));
    printf ("%s -> %s -> %s\n", $row["email"], $row["user"], $row["senha"]);

    // Free result set
    mysqli_free_result($result);

    mysqli_close($con);
?>