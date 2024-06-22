<?php
session_start();
include("./assets/conn.php");
if (isset($_COOKIE["session"])) {
  $session_Cookie = explode(" ", $_COOKIE["session"]);
  $_SESSION["user"] = $session_Cookie[0];
  $_SESSION["senha"] = $session_Cookie[1];
  $_SESSION["email"] = $session_Cookie[2];
}


if (!isset($_SESSION['user'])) {
  setcookie("naoLogado", "servicos.php"); //sessão
  header("location: login.php");
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/servicos.css">
  <script src="../js/jquery.js"></script>
  <title>Serviços</title>
</head>

<body>
  <div id="Contratar" style="display: none;">
    <div class="telaContratarServico" style="display: none;">
      <button id="close">
        <ion-icon name="close-outline"></ion-icon>

      </button>
      <h1>Contratar Serviço</h1>
      <h1 style="font-size: 1.7em;" id="servico"></h1>
      <form action="" method="post">
        <label for="nome">Nome Completo</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="tele">Telefone</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="ender">Endereço</label>
        <input type="text" id="address" name="address" required>

        <label for="disp">Dispositivo</label>
        <input type="text" id="device" name="device" required>

        <label for="descr">Descrição do Problema</label>
        <textarea id="issue" name="issue" rows="4" required></textarea>

        <button type="submit" name="submitServico">Enviar Solicitação</button>

      </form>
    </div>
    <div class="confirmacao" style="display: none;">
      <img src="https://cdn-icons-png.flaticon.com/512/1004/1004739.png">
      <h2>Serviço confirmado!</h2>
      <!--colocar a tela inicial do site-->
      <button id="okConfimacao">OK</button>
    </div>
  </div>

  <?php include "assets/header.php" ?>

  <div id="container">

    <div class="serv">
      <img src="../images/corretiva.png" />
      <div class="descr">
        <h2>Manutenção Corretiva</h2>
        <p>Reparação do computador no caso de mau funcionamento</p>
        <br />
        <button class="contratar" tipoServico="Manutenção Corretiva">Contratar</button>
      </div>
    </div>

    <div class="serv">
      <img src="../images/preventiva.png" />
      <div class="descr">
        <h2>Manutenção Preventiva Básica</h2>
        <p>Remoção de poeira e troca de pasta térmica</p>
        <br />
        <button class="contratar" tipoServico="Manutenção Preventiva Básica">Contratar</button>
      </div>
    </div>

    <div class="serv">
      <img src="../images/preventivaCompleta.png" />
      <div class="descr">
        <h2>Manutenção Preventiva Completa</h2>
        <p>Remoção de poeira, troca de pasta térmica, limpeza dos contatos e organização dos cabos</p>
        <br />
        <button class="contratar" tipoServico="Manutenção Preventiva Completa">Contratar</button>
      </div>
    </div>

    <div class="serv">
      <img src="../images/formatacao.png" />
      <div class="descr">
        <h2>Formatação</h2>
        <p>Limpar e reinstalar o sistema operacional + instalação de aplicativos essenciais</p>
        <br />
        <button class="contratar" tipoServico="Formatação">Contratar</button>
      </div>
    </div>
    <div class="serv">
      <img src="../images/montagem.png" />
      <div class="descr">
        <h2>Montagem de PC</h2>
        <p>Personalize seu próprio computador com as configurações desejadas</p>
        <br />
        <button class="contratar" tipoServico="Montagem de PC">Contratar</button>
      </div>
    </div>
  </div>


</body>

</html>
<script src="../js/servicos.js"></script>

<!-- ION ICONS  -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php
if (isset($_POST["submitServico"])) {
  echo <<<HTML
    <script>confirmacao()</script>
    HTML;
}

?>