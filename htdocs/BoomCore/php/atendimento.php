<?php
session_start();
include("assets/conn.php"); /* $conn > atendimento > id, nome, email, assunto, mensagem*/
if (isset($_COOKIE["session"])) {
  $session_Cookie = explode(" ", $_COOKIE["session"]);
  $_SESSION["user"] = $session_Cookie[0];
  $_SESSION["senha"] = $session_Cookie[1];
  $_SESSION["email"] = $session_Cookie[2];
}

if (isset($_POST['enviar'])) {
  date_default_timezone_set("America/Fortaleza");
  $dataHoraAtual = date('d/m/Y H:i:s');
  $nome = $_SESSION["user"];
  $email = $_SESSION['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];
  $sql = "INSERT INTO atendimento(nome, email, assunto, mensagem, dataHora) 
          VALUES('$nome', '$email', '$assunto', '$mensagem', '$dataHoraAtual');";
  $conn->query($sql);
  $enviado = true;
}

if (isset($_POST["respostaEnviar"])){
  $idAtendimentoAnterior = $_POST["idAtendimento"];
  $delete = "DELETE FROM atendimento where id = {$idAtendimentoAnterior};";
  $conn->query($delete);
}

if (!isset($_SESSION['user'])) {
  setcookie("naoLogado", "atendimento.php"); //sessão
  header("location: login.php");
}

//TODO MANUAL TELA ATENDIMENTOS ADMIN
/*
caso seja admin:
    tela de atendimentos:
        obter array com os itens do banco de dados
        emitir mensagens
        nova pagina de mensagens a cada 10 mensagens
        atual = 1
        SELECT * FROM `produtos` WHERE 1 LIMIT 10 OFFSET (atual-1)*10
        assocSelect
        nPags = ceil(n,10)
        while assocSelect
            echo html item valores bd

        botoes de mudar de página
            caso atual == nPags
                sem botao de proximo
            se nao, caso atual == 1
                sem botao de anterior
            se nao:
                dois botoes normais

se nao:
    tela normal
*/
?>
<html>

<head>
  <title>Boom Core</title>
  <link rel="stylesheet" href="../css/atendimento.css" />
  <script src="../js/jquery.js"></script>


</head>

<body>
  <?php include("assets/header.php");
  ?>

  <div class="container">
    <div class="cabecalho">
      <h1>ATENDIMENTO</h1>
      <div id="enviado">
        <p>Mensagem enviada!</p>
        <p id="redirecionando"></p>
      </div>
    </div>
    <?php
    if ($_SESSION["user"] == "admin") {
      $atendimentos = "SELECT * FROM atendimento order by id desc";
      $select = $conn->query($atendimentos);
      $atendimento_recebido = mysqli_fetch_assoc($select);

      $qtd_de_atendimentos_recebidos = mysqli_num_rows($select);
      if ($qtd_de_atendimentos_recebidos > 0){
        $id_recebido = $atendimento_recebido["id"];
        $nome_recebido = $atendimento_recebido["nome"];
        $email_recebido = $atendimento_recebido["email"];
        $assunto_recebido = ucfirst($atendimento_recebido["assunto"]); /* primeira letra maiuscula */
        $mensagem_recebida = $atendimento_recebido["mensagem"];
        $dataHora_recebida = $atendimento_recebido["dataHora"];
        $quantidadeTexto = "mensagens não lidas";
        if ($qtd_de_atendimentos_recebidos == 1){
          $quantidadeTexto = str_replace(["mensagens", "lidas"],["mensagem", "lida"], $quantidadeTexto);
        }
        echo
        <<<HTML
          <p id="quantidade">{$qtd_de_atendimentos_recebidos} {$quantidadeTexto}</p>
          <section id="atendimento_recebido">
            <h2>{$assunto_recebido}</h2>
            <p>{$mensagem_recebida}</p>
            <br>
            <p>Usuário: {$nome_recebido}</p>
            <p>Email: {$email_recebido}</p>
            <p>{$dataHora_recebida}</p>
          </section>
          <p style="font-size: 1.3em;">Responder</p>
          <form action="" method="post" id="resposta">
            <textarea name=""  cols="30" rows="5" required></textarea>
            <input type="hidden" name="idAtendimento" value="{$id_recebido}">
            <button type="submit" name="respostaEnviar">Enviar</button>
          </form>
        HTML;
      }else{
        echo <<<HTML
          <h1 style="text-align:center; font-size: 1.3em;">Todas as mensagens já foram respondidas!</h1>
        HTML;
      }
    } else {
      echo
      <<<HTML
        <p>Não encontrou o que procurava?<br>
        Use o canal de atendimento do Boom Core para tirar sua dúvida!</p>
        <div class="camp">
          <Form method="POST">
            <!-- <legend>Campo de atendimento</legend><br> -->
            <!-- <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" class="entrada" required maxlength="50"><br><br>
            <label for="gmail">Email:</label><br>
            <input type="email" id="gmail" name="email" class="entrada" required maxlength="70"><br><br> -->
            <label for="assunto">Assunto:</label><br>
            <input type="text" id="assunto" name="assunto" class="entrada" required maxlength="40"><br><br>
            <label for="mensag">Mensagem:</label><br>
            <textarea id="mensag" name="mensagem" rows="8" cols="40" class="entrada" required maxlength="500"></textarea><br><br>
            <button type="submit" id="enviar" name="enviar">Enviar</button>
          </Form>
        </div>
      HTML;
    }

    ?>
  </div> <!-- container -->
</body>

</html>

<?php
if (isset($enviado)) {

  echo <<<HTML
   <script>
    $("#enviado").show();
    $("#enviar").attr("disabled", true);
    $(".entrada").attr("disabled", true);
    $("#enviar").addClass("disabled");
    $(".entrada").addClass("disabled");
    
    for (let i = 0; i < 5; i++) {
      let seg = 5 - i;
      let textoRedirecionando = `redirecionando em \${seg} segundos...`
      if (seg == 1){
        textoRedirecionando = textoRedirecionando.replace("segundos", "segundo")
      }
      setTimeout(() => 
       $("p#redirecionando").text(textoRedirecionando)
      ,1000 * i)
    }
    setTimeout(() =>
      location.replace("home.php")
    ,5000)
    
   </script>
  HTML;
}
?>