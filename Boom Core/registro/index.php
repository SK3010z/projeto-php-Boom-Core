<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>


  <?php include("../presets/header.html") ?>


    <div class="flex_container">
      
      <form method="post" action="../home/">
        <h1>Cadastro</h1>
        <!-- Nome  -->
        <!-- <div class="form1"> -->
          <label for="exampleInputEmail1" class="labelInputs1" for="nome">Nome</label>
          <input type="name" class="inputs1" id="nome" name="nome"/>
        <!-- </div> -->
        <br />
        <!-- Email -->
        <!-- <div class="form1"> -->
          <label for="exampleInputPassword1" class="labelInputs1" for="email">Email</label>
          <input type="email" class="inputs1" id="email" name="email"/>
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
        <span id="spanLogin"><label for="login" class="labelSub">Já possui uma conta?</label><a href="" id="login">Login</a></span>

        
      </form>
    </div>
  </body>
</html>
