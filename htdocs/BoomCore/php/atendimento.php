<?php
session_start();
if(isset($_COOKIE["session"])){
  $_SESSION["user"] = explode(" ",$_COOKIE["session"])[0];
  $_SESSION["senha"] = explode(" ",$_COOKIE["session"])[1];
}
if (isset($_POST['enviar'])) {
  include("assets/conn.php"); /* atendimento -> id, nome, email, assunto, mensagem*/
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];
  $sql = "INSERT INTO atendimento(nome,email,assunto,mensagem) VALUES('$nome','$email','$assunto','$mensagem');";
  $conn->query($sql);
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
      <p>Não encontrou o que procurava?<br>
        Use o canal de atendimento do Boom Core para tirar sua dúvida!</p>
    </div>
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
</body>

</html>