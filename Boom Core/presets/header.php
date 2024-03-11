<div id="header">
  <span id="headerL">
    <span class="logo"
      ><a class="logo" href="./"><img src="../assets/boom core.png" alt="" /></a
    ></span>
    <span id="boom"><a href="./">Boom Core</a></span>
  </span>
  <span id="headerR">
    <!-- produtos -->
    <a
      id="produtos"
      href="./"
      onmouseover="start('traco1')"
      onmouseleave="end('traco1')"
      ><p>Produtos</p>
      <div id="traco1"></div
    ></a>

    <!-- serviços  -->
    <a
      id="servicos"
      href="./"
      onmouseover="start('traco2')"
      onmouseleave="end('traco2')"
      ><p>Serviços</p>
      <div id="traco2"></div
    ></a>

    <!-- atendimentos -->
    <a
      id="atendimentos"
      href="./"
      onmouseover="start('traco3')"
      onmouseleave="end('traco3')"
      ><p>Atendimentos</p>
      <div id="traco3"></div
    ></a>

    <!-- pesquisa  -->
    <form action="index.php" id="pesquisa" method="get">
      <!-- caixa de pesquisa  -->
      <input type="text" placeholder="Pesquisa" name="pesquisa" />
      <!-- botao de pesquisar  -->
      <input type="submit" id="botao" value="" title="pesquisar" />
    </form>

    <!-- opções do usuario  -->
    <span id="opcoesUsuario">
      <?php 
      if(isset($_SESSION['user'])){
      echo"<p class='opcaoUser' style='font-weight: 300;'>{$_SESSION['user']}</p> <br> ";
      echo"<form method='post' action='C:/xampp/htdocs/projetos/Boom Core/registro'><button type='submit' class='opcaoUser'>Encerrar sessão</button></form> <br>";
      
      }
      else{
        echo "<a class='opcaoUser' href='./login.php'>Login</a> <br>";
        echo "<a class='opcaoUser' href='./registro'>Cadastro</a>";
      }
      ?>


    </span>
    <!-- botao de usuario  -->
    <button id="botaoUsuario" onclick="opcoesUsuario('opcoesUsuario')">
      <img id="user" src="../assets/user.png" title="Perfil do usuário"/>
    </button>

    <!-- notificações  -->
    <a href="index.php"
      ><img id="notificacao" src="../assets/sino.png" title="Notificações"
    /></a>
  </span>
</div>

<style>
  @import url("../assets/reset.css");
  /*@import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");*/
  @import url("../assets/Roboto/");

  body {
    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../assets/fundo.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    
    width: 100%;
    color: white;
  }

  @keyframes start {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @keyframes end {
    0% {
      width: 100%;
    }
    100% {
      width: 0%;
    }
  }
  @keyframes abrirOpcoesUsuario{
    0%{
      height: 0px;
    }
    100%{
      height: fit-content;
    }
  }
  @keyframes fecharOpcoesUsuario{
    0%{
      height: fit-content;
    }
    100%{
      height: 0px;
    }
  }

  /* cabeçalho */
  #header {
    text-wrap: nowrap;
    width: auto;
    height: 60px;
    /*background-image: linear-gradient(90deg, #707070a8, #3633cda8);*/
    background-color: #000000a0;
    border-bottom: 2px solid rgba(255, 255, 255, 0.74);
    opacity: 100%;
    padding: 10px 1% 10px 10%;
    display: flex;
    justify-content: space-between;
    text-align: center;
  }
  /* links */
  #header a {
    color: white;
    text-decoration: none;
  }

  /*headerL (LADO ESQUERDO)*/
  /* area do logo  */
  #header #headerL {
    margin-right: 25px;
  }

  .logo {
    height: inherit;
    width: 60px;
    text-align: left;
    display: inline-block;
  }
  /* imagem do logo  */
  .logo img {
    height: inherit;
    width: inherit;
    object-fit: contain;
  }
  /* link clicavel do logo  */
  .logo a {
    height: 100%;
    width: 100%;
    display: block;
  }
  /* nome da empresa -> menu principal */
  #header #boom {
    display: inline-block;
    height: inherit;
    margin: auto 0;
    font-size: 2em;
    font-family: "roboto";
    font-weight: bold;
    color: #ffffff;
    vertical-align: top;
    margin-top: 20px;
  }

  /* headerR (DIREITA) */
  /* opcões do cabeçalho do site  */
  #header #headerR {
    width: 800px;
  }
  #header #produtos {
    display: inline-block;
    height: inherit;
    vertical-align: top;
    p {
      /*texto*/
      vertical-align: middle;
      font-size: 1.5em;
      font-weight: bold;
      margin-top: 25%;
    }
    div {
      /*traço do produtos*/
      margin: 0 auto;
      margin-top: 5%;
      width: 0%;
      height: 3px;
      display: block;
      border-radius: 1em;
      text-align: center;
      background-color: white;
    }
  }

  #header #servicos {
    display: inline-block;
    height: inherit;
    vertical-align: top;
    margin-left: 3%;
    p {
      /*texto*/
      vertical-align: middle;
      font-size: 1.5em;
      font-weight: bold;
      margin-top: 28%;
    }
    div {
      /*traço do prodrltos*/
      margin: 0 auto;
      margin-top: 5%;
      width: 0%;
      height: 3px;
      display: block;
      border-radius: 1em;
      text-align: center;
      background-color: white;
    }
  }

  #header #atendimentos {
    display: inline-block;
    height: inherit;
    vertical-align: top;
    margin-left: 3%;
    p {
      /*texto*/
      vertical-align: middle;
      font-size: 1.5em;
      font-weight: bold;
      margin-top: 17%;
    }
    div {
      /*traço do produtos*/
      margin: 0 auto;
      margin-top: 5%;
      width: 0%;
      height: 3px;
      display: block;
      border-radius: 1em;
      text-align: center;
      background-color: white;
    }
  }

  #header #pesquisa {
    margin: 18px 0 0 3%;
    display: inline-block;
    vertical-align: top;

    input[type="text"] {
      height: 30px;
      font-size: large;
      border: 0px none transparent;
      vertical-align: middle;
    }
    input#botao {
      vertical-align: middle;
      margin-top: 0;
      height: 32px;
      width: 32px;
      padding: 1px 2px;
      border: unset;
      background: url("../assets/lupa.png") no-repeat scroll transparent;
      background-position: center;
      border-radius: 10px;
      transform: translateX(-38px);

      background-size: 25px 25px;
      object-fit: contain;
    }
    input#botao:hover {
      background-color: #0000003d;
    }
  }

  #header #user {
    width: 45px;
    height: 45px;
    vertical-align: top;
    transform: translateY(30%);
    cursor: pointer;
  }

  #header #botaoUsuario{
    background-color: transparent;
    border: unset;
  }

  #header #opcoesUsuario{
    position: absolute;
    background-color: rgba(0,0,0,0.7) ;
    width: 150px;
    height: fit-content;
    right: 90px;
    top: 70px;
    border-radius: 10px;
    padding: 10.5px 0px 5px;
    border: 2px solid rgba(255, 255, 255, 0.74);
    .opcaoUser{
      font-family: 'Roboto';
      font-weight: 500;
      line-height: 2em;
      font-size: larger;
      margin-top: -10px;
      width: 100%;
      /* background-color: transparent; */
      display: grid;
      transition: background-color 0.2s;
      /* border-top: 2px solid rgba(255, 255, 255, 0.74); */
      /* border-bottom: 2px solid rgba(255, 255, 255, 0.74); */
    }
    .opcaoUser:hover{
      background-color: rgba(255,255,255,0.2);
    }
  }
  

  #header #notificacao {
    width: 45px;
    height: 45px;
    vertical-align: top;
    transform: translateY(30%);
    margin-left: 1.5%;
  }
</style>
<script>
  function start(str) {
    let traco = document.getElementById(str);
    traco.style.animation = "start 0.2s ease forwards";
  }

  function end(str) {
    let traco = document.getElementById(str);
    traco.style.animation = "end 0.2s ease forwards";
  }

  let opcoesUsuarioSwitch = false;
  function opcoesUsuario(str){

    let opcoesUsuario = document.getElementById(str)

    if (opcoesUsuarioSwitch === false){
      opcoesUsuario.style.transform = "translateY(-1000%)";
      opcoesUsuarioSwitch = true;
    }
    else{
      opcoesUsuario.style.transform = "translateY(0%)";
      opcoesUsuarioSwitch = false;

    }

  }
</script>
