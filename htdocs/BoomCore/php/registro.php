 <!-- PHP -->
<?php
session_start();
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

        if ($senha == $senha2) { 
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
                        ('$user', '$hash', '$senha')";

            mysqli_query($conn, $sql);
            $_SESSION["user"] = $_POST["user"];
            $_SESSION["senha"] = $_POST["senha"];
            header("location: home.php");
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
}


?>



<html>

  <head>
    <meta charset="utf-8" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registro.css" />  
    <title>Cadastrar</title>
  </head>

  <body>
    <?php
      include("./assets/header.php");
    ?>

    <!-- Caixa de cadastro -->
    <div class="flex_container">
      <form method="post">
        <h1 onclick="falhaConexao();">CADASTRAR</h1>
        
        <!-- Nome de usuário -->
        <label for="exampleInputEmail1" class="labelInputs1" for="user">Nome de usuário</label>
        <input type="name" class="inputs1" id="user" name="user" minlength="3" maxlength="30" required/>
        <br>

        <!-- Email -->
        <label for="exampleInputPassword1" class="labelInputs1" for="email">Email</label>
        <input type="email" class="inputs1" id="email" name="email" required/>
        <br>

        <!-- Senha -->
        <label for="senha" class="labelInputs1">Senha</label>
        <input type="password" class="inputs1" id="senha" name="senha" minlength="3" maxlength="100" required/>

        <!-- Senha2 -->
        <label for="senha2" class="labelInputs1">Confirmar Senha</label>
        <input type="password" class="inputs1" id="senha" name="senha2" minlength="3" maxlength="100" required/>

        <!-- Manter login -->
        <span id="spanManter">
          <input type="checkbox" name="manter" id="manter">
          <label for="manter" class="labelSub">Manter-me conectado</label>
        </span>
        <br>

        <!-- Enviar -->
        <button type="submit" id="botaoEnviar" name="enviar">Enviar</button>

        <!-- Caso falha na conexao com o banco de dados  -->
        <div id="divFalha">
          <p id="pFalha">
          </p>
        </div>

        <!-- Ja possui uma conta?  -->
        <span id="spanLogin">
          <label for="login" class="labelSub">Já possui uma conta?</label>
          <a href="./login.php" id="login">Entrar</a>
        </span>

        
      </form>
    </div>
  </body>
</html>
<script src="../js/registro.js"></script>

<?php
  if ($errorConn){
    echo"
        <script>
          falhaConexao();
        </script>
      ";
  }
  else if ($errorUserJaExiste){
    echo"
        <script>
          falhaUserJaExiste();
        </script>
      ";
  }
  else if ($errorEmailJaUtilizado){
    echo"
        <script>
          falhaEmailJaUtilizado();
        </script>
      ";
  }
  else if ($errorSenhasDiferentes){
    echo"
        <script>
          falhaSenhasDiferentes();
        </script>
      ";
  }
?>

