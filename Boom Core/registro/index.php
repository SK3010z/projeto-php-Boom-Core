<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>


  <div id="header">
        <span id="headerL">
            <span class="logo"><a class="logo" href="./"><img src="../assets/boom core.png" alt=""></a></span>
            <span id="boom"><a href="./">Boom Core</a></span>
        </span>
    </div>


    <div class="flex_container">
      
      <form method="post" action="../home/">
        <h1>Cadastro</h1>
        <!-- Nome  -->
        <!-- <div class="form1"> -->
          <label for="exampleInputEmail1" class="labelInputs1">Nome</label>
          <input type="name" class="inputs1" id="exampleInputEmail1" name="nome"/>
        <!-- </div> -->
        <br />
        <!-- Email -->
        <!-- <div class="form1"> -->
          <label for="exampleInputPassword1" class="labelInputs1">Email</label>
          <input type="email" class="inputs1" id="exampleInputPassword1" name="email"/>
        <!-- </div> -->
        <br />
        <!-- Senha  -->
        <!-- <div class="form1"> -->
          <label for="exampleInputPassword1" class="labelInputs1">Senha</label>
          <input
            type="password"
            class="inputs1"
            id="exampleInputPassword1"
            name="senha"
          />
        <span><input type="checkbox" name="manter" id="manter"><label for="manter" id="labelManter">Manter-me conectado</label></span>
        <span><a href=""></a></span>
        <!-- </div> -->
        <br />
        <!-- enviar -->
        <button type="submit" id="botaoEnviar">Enviar</button>

        
      </form>
    </div>
  </body>
</html>
