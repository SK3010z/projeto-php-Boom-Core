<?php
    include("./assets/conn.php");
    $sql = "SELECT user, senha from contas where user = 'joao'"; 
    //EXECUTA o codigo sql
    $select = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($select);
    echo $linha['user'] . $linha['senha'];
?>