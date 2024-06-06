<?php
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
  setcookie($_SESSION["user"], 0, time() - 3600);
}
?>

<div id="header">

  <span id="headerL">
    <span class="logo">
      <a class="logo" href="./home.php">
        <img src="../images/boom core.png" alt="" />
      </a>
    </span>
    <span id="boom">
      <a href="./home.php">
        <label>Boom Core</label><br>
        <small>Assistência técnica delivery</small>
      </a>
    </span>
  </span>

  <span id="headerR">
    <!-- Produtos -->
    <a id="produtos" class="opcoesHeader" href="./home.php">
      <p>Produtos</p>
      <div class="traco"></div>
    </a>

    <!-- Serviços  -->
    <a href="servicos.php" id="servicos" class="opcoesHeader">
      <p>Serviços</p>
      <div class="traco"></div>
    </a>

    <!-- atendimentos -->
    <a href="atendimento.php" id="atendimentos" class="opcoesHeader">
      <p>Atendimento</p>
      <div class="traco"></div>
    </a>

    <!-- pesquisa  -->
    <form action="home.php" id="pesquisa" method="get">
      <!-- caixa de pesquisa  -->
      <input type="text" placeholder="Pesquisar Produto" name="promptPesquisa" />
      <!-- botao de pesquisar  -->
      <input type="submit" id="botao" value="" title="pesquisar" name='pesquisa' />
    </form>


    <!-- caixa de opções do usuario  -->
    <span id="user">

      <span id="opcoesUsuario">
        <?php
        // Se um nome de usuario estiver definido... 

        // Undefined global variable $_SESSION in C:\xampp\htdocs\BoomCore\php\assets\header.php on line 64 NULL
        if (isset($_SESSION['user'])) {
          //nome do usuario 
          echo "<p class='opcaoUser' style='font-weight: 300;'>{$_SESSION['user']}</p> <br> ";
          // botao de encerrar sessão
          echo "<form method='post' action='' name='logout'>
                  <input class='opcaoUser' type='submit' name='logout' value='Encerrar sessão'>
                </form>
                <br>";
        }
        // Se nao estiver com um nome de usuario definido... 
        else {
          // botao pra pagina de login 
          echo "<a class='opcaoUser' href='./login.php'>Entrar</a> <br>";
          // botao pra pagina de Cadastro
          echo "<a class='opcaoUser' href='./registro.php'>Cadastrar</a>";
        }
        ?>
      </span>
      <!-- botao de usuario  -->
      <button id="botaoUsuario">
        <img src="../images/user.png" title="Perfil do usuário" />
      </button>
    </span>
    <!-- notificações  -->
    <button id="notificacao">
      <img src="../images/sino.png" title="Notificações" />
      <span id="contagem-notificacoes">99</span>
      <span id="tela-notificacoes"></span>
    </button>
  </span>
</div>
<?php
$css = $_SERVER["DOCUMENT_ROOT"] . "/Boomcore/css/header.css";
echo <<<STYLE
STYLE
?>

<style>
  @import url(../css/header.css);
</style>

<script src="../js/header.js">

</script>