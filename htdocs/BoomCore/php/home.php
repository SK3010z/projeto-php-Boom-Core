<?php
session_start();
include("./assets/conn.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BoomCore</title>
  <link rel="icon" href="../images/boom core.png">
  <link rel="stylesheet" href="../css/home.css">

</head>

<body>

  <?php include("./assets/header.php");


  if (isset($_SESSION["user"])) {
    echo "<h1 style='font-size: xx-large; text-align: center; margin-top: 20px'>Seja bem-vindo <b style='font-weight: bold'>{$_SESSION['user']}</b>!</h1>";
  } else {
  }



  ?>
  <!-- <div id="site"> -->
  <div id="container">
    <?php
    $sql = "SELECT preco, descricao, img_url FROM produtos order by preco ";
    //EXECUTA o codigo sql
    $select = mysqli_query($conn, $sql);
    while ($produto = mysqli_fetch_assoc($select)) {
      $img_url = $produto['img_url'];
      $descricao = $produto['descricao'];
      $preco = number_format($produto['preco'], 2, ',', '.');
      echo "
          <div class='card'>
            <img src='{$img_url}'/>
            <div>
              <h2>{$descricao}</h2>
              <p class='valor'>R\${$preco}</p><br>
              <button>Comprar</button>
            </div>
          </div>
        ";
    }
    ?>
  </div>
  <!-- </div> -->


</body>

</html>