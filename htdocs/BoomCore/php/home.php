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
    
</head>
<body>
    
    <?php include("./assets/header.php");
    

    if (isset($_SESSION["user"])) {
        echo "<h1 style='font-size: xx-large; text-align: center; margin-top: 20px'>Seja bem-vindo <b style='font-weight: bold'>{$_SESSION['user']}</b>!</h1>";
    }

    else{
        
    }



    ?>
    <div class="card">
    <img src="https://http2.mlstatic.com/D_NQ_NP_615386-MLB52544612239_112022-O.webp"/>
   <div>
    <h2>Placa De Vídeo Nvidia Asus Dual Geforce Rtx 3060 Series</h2>
    <p class="valor">R$ 3.000</p><br>
    <button>Comprar</button>
    </div>
   </div>
   <style>
   /* body{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: "Arial";
      gap: 16px;
      background-color: Blue;
    } */

    .card{
      Background-color: white;
      width: 80px;
      height: 360px;
      border-radius: 16px;
      box-shadow: 4px 4px 12px gray;
    }

    .card img {
      width: 80%;
      height: 160px;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;}

    .valor {
      color: black;
      font-size: 1.em;
      font-weight: bold;}

    .card div {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 4px;
      height: 70%;}

      .card h2 {
      font-size: 1.4rem;
        color: black;}

    .card button{
      Background-color: blue;
      height: 36px;
      border: none;
      padding: 4px;
      width: 80%;
    color: white;
      font-size: 1rem;
      line-height: bold;
      border-radius: 4px;
    }

    .card button:hover {
      background-color: #137de8;
      cursor: pointer;
    }
</style>
</body>
</html>