 <!-- PHP -->

<?php
  session_start();
  // Se nenhum estiver vazio 
  if(isset($_POST["enviar"]))
  {
    try{
      include("./php_assets/conn.php"); // $conn -> boomcore -> contas(id, user, senha, email)
      $sql = "INSERT INTO contas(user, senha, email) VALUES
              ('{$_POST["user"]}', '{$_POST["senha"]}', '{$_POST["email"]}');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $_SESSION["user"] = $_POST["user"];
      $_SESSION["email"] = $_POST["email"];
      $_SESSION["senha"] = $_POST["senha"];
      header("Location: home.php");
    }
    catch(null){
      echo"
        <script>
          falhaConexao();
        </script>
      ";
    }
  }
  
?>

<html>

  <head>
    <meta charset="utf-8" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registro.css" />  
  </head>

  <body>
    <?php
      include("./php_assets/header.php");
    ?>

    <!-- Caixa de cadastro -->
    <div class="flex_container">
      <form method="post">
        <h1>Cadastrar</h1>
        
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


