<?php
  session_start();
?>

<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>


  <?php
  include("./header.php");
  ?>


    <div class="flex_container">
      
      <form method="post" action="registro.php">
        <h1>Cadastrar</h1>
        <!-- Nome  -->
        <!-- <div class="form1"> -->
          <label for="exampleInputEmail1" class="labelInputs1" for="user">Nome de usuário</label>
          <input type="name" class="inputs1" id="user" name="user" maxlength="15"/>
        <!-- </div> -->
        <br/>
        <!-- Email -->
        <!-- <div class="form1"> -->
          <label for="exampleInputPassword1" class="labelInputs1" for="email">Email</label>
          <input type="email" class="inputs1" id="email" name="email"/>
        <!-- </div> -->
        <br/>
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
        <button type="submit" id="botaoEnviar" name="enviar">Enviar</button>
        <span id="spanLogin"><label for="login" class="labelSub">Já possui uma conta?</label><a href="./login.php" id="login">Entrar</a></span>

        
      </form>
    </div>
  </body>
</html>



<!-- PHP -->
<?php
  
  if(isset($_POST["enviar"])){echo "true";}
  if(isset($_POST["enviar"])){
    $_SESSION["user"] = $_POST["user"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["senha"] = $_POST["senha"];
    $_SESSION["teste"] = "yeah";
  };
  foreach ($_POST as $key => $value) {
    # code...
    echo $key . $value . "<br>";
  }
  foreach ($_SESSION as $key => $value) {
    # code...
    echo $key . $value . "<br>";
  }
?>

<!-- CSS -->
<style>
  @import url("./assets/reset.css");
@import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

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

