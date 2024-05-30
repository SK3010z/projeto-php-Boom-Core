<?php
session_start();
if(isset($_COOKIE["session"])){
  $_SESSION["user"] = explode(" ",$_COOKIE["session"])[0];
  $_SESSION["senha"] = explode(" ",$_COOKIE["session"])[1];
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
  <?php include "assets/header.php" ?>
  <div id="container">

    <div class="serv">
      <img src="../images/corretiva.png" />
      <div class="descr">
        <h2>Manutenção Corretiva</h2>
        <p>Reparação do computador no caso de mau funcionamento</p>
        <br />
        <button>Contratar</button>
      </div>
    </div>

    <div class="serv">
      <img src="../images/preventiva.png" />
      <div class="descr">
        <h2>Manutenção Preventiva Básica</h2>
        <p>Remoção de poeira e troca de pasta térmica</p>
        <br />
        <button>Contratar</button>
      </div>
    </div>

    <div class="serv">
      <img src="../images/preventivaCompleta.png" />
      <div class="descr">
        <h2>Manutenção Preventiva Completa</h2>
        <p>Remoção de poeira, troca de pasta térmica, limpeza dos contatos e organização dos cabos</p>
        <br />
        <button>Contratar</button>
      </div>
    </div>

    <div class="serv">
      <img src="../images/formatacao.png" />
      <div class="descr">
        <h2>Formatação</h2>
        <p>Limpar e reinstalar o sistema operacional + instalação de aplicativos essenciais</p>
        <br />
        <button>Contratar</button>
      </div>
    </div>
    <div class="serv">
      <img src="../images/montagem.png" />
      <div class="descr">
        <h2>Montagem de PC</h2>
        <p>Personalize seu próprio computador com as configurações desejadas</p>
        <br />
        <button>Contratar</button>
      </div>
    </div>
  </div>

</body>

</html>