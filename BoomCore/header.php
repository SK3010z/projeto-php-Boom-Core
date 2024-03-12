<div id="header">
  <span id="headerL">
    <span class="logo"
      ><a class="logo" href="./home.php"><img src="./assets/boom core.png" alt="" /></a
    ></span>
    <span id="boom"><a href="./home.php">Boom Core</a></span>
  </span>
  <span id="headerR">
    <!-- produtos -->
    <a
      id="produtos"
      class="opcoesHeader"
      href="./home.php"
      onmouseover="start('traco1')"
      onmouseleave="end('traco1')"
      ><p>Produtos</p>
      <div id="traco1"></div
    ></a>

    <!-- serviços  -->
    <a
      id="servicos"
      class="opcoesHeader"
      href="./home.php"
      onmouseover="start('traco2')"
      onmouseleave="end('traco2')"
      ><p>Serviços</p>
      <div id="traco2"></div
    ></a>

    <!-- atendimentos -->
    <a
      id="atendimentos"
      class="opcoesHeader"
      href="./home.php"
      onmouseover="start('traco3')"
      onmouseleave="end('traco3')"
      ><p>Atendimentos</p>
      <div id="traco3"></div
    ></a>

    <!-- pesquisa  -->
    <form action="home.php" id="pesquisa" method="get">
      <!-- caixa de pesquisa  -->
      <input type="text" placeholder="Pesquisa" name="pesquisa" />
      <!-- botao de pesquisar  -->
      <input type="submit" id="botao" value="" title="pesquisar" />
    </form>

    <!-- opções do usuario  -->
    <span id="opcoesUsuario">
      <?php 
      if(isset($_SESSION['user'])){
      echo "<p class='opcaoUser' style='font-weight: 300;'>{$_SESSION['user']}</p> <br> ";
      echo "<form method='post' action='' name='logout'><input class='opcaoUser' type='submit' name='logout' value='Encerrar sessão'></input></form> <br>";
      
      }
      else{
        echo "<a class='opcaoUser' href='./login.php'>Entrar</a> <br>";
        echo "<a class='opcaoUser' href='./registro.php'>Cadastro</a>";
      }

      ?>
    

    </span>
    <!-- botao de usuario  -->
    <button id="botaoUsuario" onclick="opcoesUsuario('opcoesUsuario')">
      <img id="user" src="./assets/user.png" title="Perfil do usuário"/>
    </button>

    <!-- notificações  -->
    <a href="index.php"
      ><img id="notificacao" src="./assets/sino.png" title="Notificações"
    /></a>
  </span>
</div>
<style>
  @import url(css/header.css);
</style>

<script src="js/header.js">
</script>
