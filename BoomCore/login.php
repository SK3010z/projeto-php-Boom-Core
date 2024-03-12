<?php 
  session_start();
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
@import url("./assets/reset.css");


@keyframes aumentar {
  0% {
    height: 1em;
  }
  100% {
    height: 1em;
  }
}


/* CAIXA DE CADASTRO  */
.flex_container {
  display: block;
  height: fit-content;
  width: 400px;
  margin: 80px auto 0;
  background-color: transparent;
  border: 3px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  padding: 60px 30px;
  align-content: center;
  transform: scale(0.9);
}

.flex_container form {
  h1 {
    font-family: "Roboto";
    font-size: 3em;
    font-weight: 700;
    text-align: center;
    color: white;
    margin-bottom: 20px;
    transition: 0.2s;
  }

  
  label.labelInputs1 {
    font-size: 1.3em;
    font-family: "Roboto";
    text-align: left;
    justify-content: left;
    font-weight: 500;
    color: white;
  }
  
  label.labelSub {
    font-size: 1.1em;
    font-family: "Roboto";
    font-weight: 400;
    color: white;

  }
  #spanManter{
    text-align: left;
    justify-content: left;
  }
  #spanLogin{
    text-align: center;
    justify-content: center;
    display: grid;
    margin: auto;
    a{
      color: white;
      text-decoration: none;
      font-size: 1.3em;
      font-weight: bold;
    }
    a:hover{
      text-decoration: underline;
    }
  }
  input.inputs1 {
    width: 100%;
    font-size: 1.2em;
    height: 1.8em;
    box-shadow: 2px 2px grey;
    border-radius: 20px 20px / 30px 30px;
    margin-bottom: 20px;
    transition: height 0.2s;
  }
  input.inputs1:focus {
    /* animation: aumentar 2s; */

    height: 2.1em;
  }
  input#manter {
    width: 1.4em;
    height: 1.4em;
    border-radius: 7px;
  }
  button {
    border: none;
    background-color: #00000030;
    border-radius: 20px;
    padding: 3px;
    font-family: "Roboto";
    font-size: 2em;
    font-weight: 500;
    text-align: center;
    margin: 15px auto;
    color: white;
    cursor: pointer;
    display: block;
    width: 80%;
  }
}

</style>