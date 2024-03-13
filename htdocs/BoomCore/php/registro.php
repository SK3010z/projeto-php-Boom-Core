 <!-- PHP -->
<?php
  session_start();
  if(isset($_POST["enviar"])){
    $_SESSION["user"] = $_POST["user"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["senha"] = $_POST["senha"];
    
    header("Location: home.php");
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
      include("./header.php");
    ?>

    <!-- Caixa de cadastro -->
    <div class="flex_container">
      <form method="post" action="">
        <h1>Cadastrar</h1>
        
        <!-- Nome de usuário -->
        <label for="exampleInputEmail1" class="labelInputs1" for="user">Nome de usuário</label>
        <input type="name" class="inputs1" id="user" name="user" maxlength="15" minlength="3"/>
        <br>

        <!-- Email -->
        <label for="exampleInputPassword1" class="labelInputs1" for="email">Email</label>
        <input type="email" class="inputs1" id="email" name="email"/>
        <br>

        <!-- Senha -->
        <label for="senha" class="labelInputs1">Senha</label>
        <input type="password" class="inputs1" id="senha" name="senha"/>

        <!-- Manter login -->
        <span id="spanManter">
          <input type="checkbox" name="manter" id="manter">
          <label for="manter" class="labelSub">Manter-me conectado</label>
        </span>
        <br>

        <!-- Enviar -->
        <button type="submit" id="botaoEnviar" name="enviar">Enviar</button>

        <!-- Ja possui uma conta?  -->
        <span id="spanLogin">
          <label for="login" class="labelSub">Já possui uma conta?</label>
          <a href="./login.php" id="login">Entrar</a>
        </span>

        
      </form>
    </div>
  </body>
</html>


