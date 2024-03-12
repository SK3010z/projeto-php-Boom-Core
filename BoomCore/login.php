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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>
<body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->


  <?php 
    include("./header.php");
  ?>


    <div class="flex_container">
      
      <form method="post" action="./home.php">
        <h1>Entrar</h1>
        <!-- Nome  -->
        <!-- <div class="form1"> -->
          <label for="exampleInputEmail1" class="labelInputs1" for="user">Nome de usuário</label>
          <input type="name" class="inputs1" id="user" name="user"/>
        <!-- </div> -->
        <br />
        <!-- Senha  -->
        <!-- <div class="form1"> -->
          <label for="senha" class="labelInputs1">Senha</label>
          <input
            type="password"
            class="inputs1"
            id="senha"
            name="senha"
          />
        <span id="spanManter"><input type="checkbox" name="manter" id="manter"><label for="manter" class="labelSub">Manter-me conectado</label></span>
        <!-- </div> -->
        <br />
        <!-- enviar -->
        <button type="submit" id="botaoEnviar">Enviar</button>
        <span id="spanLogin"><label for="login" class="labelSub">Ainda não possui uma conta?</label><a href="./registro.php" id="login">Cadastrar</a></span>

        
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