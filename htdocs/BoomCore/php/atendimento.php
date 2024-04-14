<html>

<head>
  <title>Boom Core</title>
  <link rel="stylesheet" href="../css/atendimento.css" />
</head>

<body>
  <?php include("assets/header.php"); ?>

  <div class="container">
    <div class="cabecalho">
      <h1>ATENDIMENTO</h1>
      <p>Não encontrou o que procurava?<br>
        Use o canal de atendimento do Boom Core para tirar sua dúvida!</p>
    </div>
    <Form method="POST">
      <div class="camp">
        <!-- <legend>Campo de atendimento</legend><br> -->
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" class="entrada"><br><br>
        <label for="gmail">Email:</label><br>
        <input type="email" id="gmail" name="gmail" class="entrada"><br><br>
        <label for="assunto">Assunto:</label><br>
        <input type="text" id="assunto" name="assunto" class="entrada"><br><br>
        <label for="mensag">Mensagem:</label><br>
        <textarea id="mensag" name="mensag" rows="8" cols="40" class="entrada"></textarea><br><br>
        <button type="submit" id="enviar" name="enviar">Enviar</button>
    </Form>
  </div>
  </div>
  </div>
</body>

</html>