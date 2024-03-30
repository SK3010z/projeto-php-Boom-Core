<?php
$errorConn = false;
$errorUserJaExiste = false;
$errorEmailJaUtilizado = false;
$errorSenhasDiferentes = false;
try {
    //CONEXAO com o BANCO DE DADOS
    include("./assets/conn.php"); // $conn -> boomcore -> contas(id, user, senha, email)

    if(isset($_POST["enviar"])){
        $senha = $_POST["senha"];
        $senha2 = $_POST["senha2"];

        if ($senha1 == $senha2) { 
        $user = filter_input(INPUT_POST,"user",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

        $sqlSelect = "SELECT user, email from contas where user = '{$user}' or email = '{$email}'"; 
        $select = mysqli_query($conn, $sqlSelect);
        
        //se ja existir algum correspondente
        if (mysqli_num_rows($select) > 0){
            $linha = mysqli_fetch_assoc($select);
            //se for o msm usuario
            if ($linha['user'] == $user){
            $errorUserJaExiste = true;
            
            }
            //senao, se for o msm email
            else if ($linha['email'] == $email){
            $errorEmailJaUtilizado = true;
            
            }
        }
        else{
            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO contas (user, senha, email) VALUES
                        ('$user', '$email', '$hash')";

            mysqli_query($conn, $sql);
            
            header("location: index.php");
        }
        }
        else{
        $errorSenhasDiferentes = true;

        }
  }
  mysqli_close($conn);
} 
catch (Exception $e) {
  $errorConn = true;
  echo $e;
}


?>