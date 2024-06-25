<?php
$errorConn = false;
$errorValid = false;
session_start();

if (isset($_SESSION['user'])) {
  header("location: ./");
}

if (isset($_COOKIE["session"])) {
  $session_Cookie = explode(" ", $_COOKIE["session"]);
  $_SESSION["user"] = $session_Cookie[0];
  $_SESSION["senha"] = $session_Cookie[1];
  $_SESSION["email"] = $session_Cookie[2];
}
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
}

if (isset($_POST["enviar"])) {
  try {
    include("./assets/conn.php"); // $conn -> boomcore -> contas(id, user, senha, email)

    //SELECIONA os itens que corresponderem com USER e SENHA nas ENTRADAS do LOGIN
    $sql = "SELECT user, senha, email from contas where user = '{$_POST["user"]}'";
    //EXECUTA o codigo sql
    $select = mysqli_query($conn, $sql);
    //array associativo do select
    $linha = mysqli_fetch_assoc($select);
    //Se existir algum valor(que é o caso que corresponde), INICIA A SESSAO e leva para a pagina principal
    if (mysqli_num_rows($select) > 0 && password_verify($_POST['senha'], $linha['senha'])) {

      //FECHA a CONEXÃO com o banco de dados
      mysqli_close($conn);
      //DEFINE os valoroes da SESSAO 
      $_SESSION["user"] = $_POST["user"];
      $_SESSION["senha"] = $linha["senha"];
      $_SESSION["email"] = $linha["email"];

      if (isset($_POST["manter"])) {
        setcookie("session", "{$_SESSION["user"]} {$SESSION['senha']} {$SESSION['email']}", time() + (365 * 24 * 60 * 60)); //nunca expirar
      }
      //expira o cookie
      if (isset($_COOKIE['naoLogado'])) {
        $direcionar = $_COOKIE['naoLogado'];
        setcookie("naoLogado", '', time() - 3600);
        header("location: {$direcionar}");
      } else {
        //leva para a PAGINA PRINCIPAL
        header("Location: home.php");
      }
    }
    //caso nao encontre valor correspondente, exibe que o usuario e/ou a senha estão incorretos abaixo do login
    else {
      $errorValid = true;
    }
  }
  //ERRO em CONECTAR com o BANCO DE DADOS, exibe que nao foi possivel conectar com o servidor abaixo do login
  catch (Exception $e) {
    $errorConn = true;
  }
}

?>

<html>

<head>
  <meta charset="utf-8" />
  <!-- CSS  -->
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
  <script src="../js/jquery.js"></script>
  <link rel="icon" href="../images/boom core.png">

  <title>Entrar</title>

</head>

<body>
  <div id="corpo">
    <?php
    include("./assets/header.php");
    ?>
    <div id="divAtendimentoNaoLogado">
      <p id="pAtendimentoNaoLogado">
      </p>
    </div>
    <div class="flex_container">

      <form method="post">
        <h1>ENTRAR</h1>

        <?php
        $oldUser = isset($_POST['user']) ? $_POST['user'] : '';
        $oldSenha = isset($_POST['senha']) ? $_POST['senha'] : '';

        echo "
        <!-- Nome  -->
        <label for='exampleInputEmail1' class='labelInputs1' for='user'>Nome de usuário</label>
        <img src='../images/userLogin.png' alt='usuário' class='iconLabelLogin'>
        <input type='name' class='inputs1' id='user' name='user' minlength='3' maxlength='30' required value='{$oldUser}' />

        <br>

        <!-- Senha  -->
        <label for='senha' class='labelInputs1'>Senha</label>
        <img src='../images/senhaLogin.png' alt='usuário' class='iconLabelLogin'>
        <button type='button' class='botaoOlho' onclick=\"exibirEsconderSenha('olho','senha')\"><img  src='../images/olhoMostrar.png' alt='exibir senha' id='olho' ></button>
        <input type='password' class='inputs1' id='senha' name='senha' minlength='3' maxlength='100' required value='{$oldSenha}' />
        "
        ?>





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
          <a href="./cadastro.php" id="login">Cadastrar</a>
        </span>

      </form>

    </div>
  </div> <!-- corpo -->
  <?php include("./assets/footer.php"); ?>
</body>

</html>

<script src="../js/login.js"></script>

<?php
if (isset($_COOKIE["naoLogado"])) {
  if ($_COOKIE["naoLogado"] == "atendimento.php") {
    echo "
      <script>
      atendimentoNaoLogado();
      </script>
    ";
  } else if ($_COOKIE["naoLogado"] == "servicos.php") {
    echo "
      <script>
      servicosNaoLogado();
      </script>
    ";
  }
}
//erro com maior prioridade de aparecer, por isso if e elseif
//FALHA na CONEXAO com o BANCO DE DADOS
if ($errorConn) {
  echo "
        <script>
          falhaConexao();
        </script>
      ";
}
//Usuario e/ou senha incorretos
elseif ($errorValid) {
  echo "
      <script>
        incorreto(); 
      </script>
    ";
}
?>