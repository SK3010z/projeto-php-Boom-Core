<?php
session_start();

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
    for ($i = 0; $i < 170; $i += 4) {

      for ($i = 0; $i < 170; $i += 4)
        echo "
          <div class='card'>
            <img src='../produtos/Geforce Rtx 3060 Series.png'/>
            <div>
              <h2>Placa De Vídeo Nvidia Asus Dual Geforce Rtx 3060 Series</h2>
              <p class='valor'>R$ 3.000</p><br>
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