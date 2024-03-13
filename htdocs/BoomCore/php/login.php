<?php 
  session_start();
  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <!-- CSS  -->
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
    
  </head>
  <body>

  <?php 
    include("./header.php");
  ?>

    <div class="flex_container">
      
      <form method="post" action="./home.php">
        <h1>Entrar</h1>

        <!-- Nome  -->
        <label for="exampleInputEmail1" class="labelInputs1" for="user">Nome de usuário</label>
        <input type="name" class="inputs1" id="user" name="user"/>
        <br>
          
        <!-- Senha  -->
        <label for="senha" class="labelInputs1">Senha</label>
        <input type="password" class="inputs1" id="senha" name="senha"/>
        
        <span id="spanManter">
          <input type="checkbox" name="manter" id="manter">
          <label for="manter" class="labelSub">Manter-me conectado</label>
        </span>
        <br>

        <!-- enviar -->
        <button type="submit" id="botaoEnviar">Enviar</button>
        <span id="spanLogin">
          <label for="login" class="labelSub">Ainda não possui uma conta?</label>
          <a href="./registro.php" id="login">Cadastrar</a>
        </span>
  
      </form>

    </div>

  </body>
</html>

<?php

/*
  if (isset($_POST["enviar"])){
    $_SESSION["user"] = $_POST["user"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["senha"] = $_POST["senha"];

  }
*/
foreach ($_SESSION as $key => $value) {
  # code...
  echo $key . $value . "<br>";
}

?>


<style>
@import url();
</style>