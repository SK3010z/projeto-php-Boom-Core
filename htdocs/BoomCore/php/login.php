<?php 
  session_start();
  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
  }

  if(isset($_POST["enviar"]))
  {
    // AAAAAAAAAAAAAAAAA DA UUM JEITO DE VERIFICAR SE EXISTE NO BANCO DE DADOS E ENT INICIAR A SESSAO
    try{
      include("./php_assets/conn.php"); // $conn -> boomcore -> contas(id, user, senha, email)
      
      //SELECIONA os itens que corresponderem com USER e SENHA nas ENTRADAS do LOGIN
      $sql = "SELECT * from contas where user = '{$_POST["user"]}' and senha = '{$_POST["senha"]}'"; 
      //EXECUTA o codigo sql
      $select = mysqli_query($conn, $sql);
      //Se existir algum valor(que é o caso que corresponde), INICIA A SESSAO e leva para a pagina principal
      if(mysqli_num_rows($select) > 0){
        //array associativo do select
        $linha = mysqli_fetch_assoc($select);
        //FECHA a CONEXÃO com o banco de dados
        mysqli_close($conn);
        //DEFINE os valoroes da SESSAO 
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["senha"] = $_POST["senha"];
        //leva para a PAGINA PRINCIPAL
        header("Location: home.php");
      }
      //caso nao encontre valor correspondente, exibe que o usuario e/ou a senha estão incorretos abaixo do login
      else{
        echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
        NAO TA EXECUTANDO O SCRIPTTTTTTTTTT falhaConexao()
        
        echo"
          <script>
            falhaConexao(); 
          </script>
        ";
      }
    }
    //ERRO em CONECTAR com o BANCO DE DADOS, exibe que nao foi possivel conectar com o servidor abaixo do login
    catch(null){
      echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
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
    <!-- CSS  -->
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
    
  </head>
  <body>

  <?php 
    include("./php_assets/header.php");
  ?>

    <div class="flex_container">
      
      <form method="post">
        <h1>Entrar</h1>

        <!-- Nome  -->
        <label for="exampleInputEmail1" class="labelInputs1" for="user">Nome de usuário</label>
        <input type="name" class="inputs1" id="user" name="user" minlength="3" maxlength="30" required/>
        <br>
          
        <!-- Senha  -->
        <label for="senha" class="labelInputs1">Senha</label>
        <input type="password" class="inputs1" id="senha" name="senha" minlength="3" maxlength="100" required/>
        
        <span id="spanManter">
          <input type="checkbox" name="manter" id="manter">
          <label for="manter" class="labelSub">Manter-me conectado</label>
        </span>
        <br>

        <!-- enviar -->
        <button type="submit" id="botaoEnviar" name="enviar">Enviar</button>

        <div id="divFalha">
          <p id="pFalha">
          </p>
        </div>

        <span id="spanLogin">
          <label for="login" class="labelSub">Ainda não possui uma conta?</label>
          <a href="./registro.php" id="login">Cadastrar</a>
        </span>
  
      </form>

    </div>

  </body>
</html>

<script src="../js/login.js"></script>


<style>
@import url();
</style>