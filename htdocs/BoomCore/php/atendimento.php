<?php
session_start();
include("assets/conn.php"); /* $conn > atendimento > id, nome, email, assunto, mensagem*/

include("./vendor/includes/config.php");
include("./vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);



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
  $sql = "INSERT INTO atendimento(nome, email, assunto, mensagem, dataHora, respondido) 
          VALUES('$nome', '$email', '$assunto', '$mensagem', '$dataHoraAtual', 'NAO');";
  
  
  $conn->query($sql);
  $enviado = true;
}

if (isset($_POST["respostaEnviar"])){
  $resposta = $_POST["resposta"];
  $assuntoCliente = $_POST["assuntoCliente"];
  
  $mensagem = <<<MENSAGEM
  Sobre o assunto "$assuntoCliente": <br>
  <br>
  $resposta
  MENSAGEM;

  $emailCliente = $_POST["emailCliente"];
  $headers = "From: boomcoreoficial@gmail.com";

    
  try {
    // Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = SMTP_USER;                     //SMTP username
    $mail->Password   = SMTP_PASS;                               //SMTP password
    $mail->Port       = SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('boomcoreoficial@gmail.com', 'BoomCore');
    $mail->addAddress($emailCliente, 'BoomCore');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Atendimento ao cliente - BoomCore';
    $mail->Body    = $mensagem;

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



  $idAtendimentoAnterior = $_POST["idAtendimento"];
  $resposta = "UPDATE atendimento SET resposta = '{$resposta}',respondido = 'SIM' where id = {$idAtendimentoAnterior};";
  
  $conn->query($resposta);
}

if (!isset($_SESSION['user'])) {
  setcookie("naoLogado", "atendimento.php"); //sessão
  header("location: login.php");
}

?>
<html>

<head>
  <title>Boom Core</title>
  <link rel="stylesheet" href="../css/atendimento.css" />
  <script src="../js/jquery.js"></script>
  <link rel="icon" href="../images/boom core.png">


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
      $atendimentos = "SELECT * FROM atendimento WHERE respondido = 'NAO' ORDER BY id";
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
            <textarea name="resposta"  cols="30" rows="5" required></textarea>
            <input type="hidden" name="assuntoCliente" value= "{$assunto_recebido}">
            <input type="hidden" name="emailCliente" value= "{$email_recebido}">
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