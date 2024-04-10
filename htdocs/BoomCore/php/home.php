<?php
session_start();
include("./assets/conn.php");

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
}
if (isset($_POST['delete'])) {
  $idProduto =  $_POST['idProduto'];
  $sqlDel = "DELETE FROM produtos WHERE id = '{$idProduto}'";
  mysqli_query($conn, $sqlDel);
}
if (isset($_POST['submitEditProduto'])) {
  $idProduto =  $_POST['idProduto'];
  $novoPreco = $_POST['precoEdit'];
  $novaDesc = $_POST['descricaoEdit'];
  $sqlEdit = "UPDATE produtos SET preco='{$novoPreco}', descricao='{$novaDesc}' WHERE id='{$idProduto}'";
  mysqli_query($conn, $sqlEdit);
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








  <?php include("./assets/header.php"); ?>


  <form action="" method="get">

  </form>


  <?php
  if (isset($_SESSION["user"])) {
    echo "<h1 style='font-size: xx-large; text-align: center; margin-top: 20px'>Seja bem-vindo <b style='font-weight: bold'>{$_SESSION['user']}</b>!</h1>";
  } else {
  }

  if (isset($_SESSION["user"]) and $_SESSION["user"] == "admin") {

    echo "
      <div id='adminDiv'>
        <form action='' method='post' enctype='multipart/form-data'>
          <h2>Novo produto</h2>
          <input type='number' name='preco' placeholder='preço' step='0.01'>
          <input type='text' name='descricao' placeholder='descrição'>
          <label for='imagem'>Imagem:</label><input type='file' name='imagem' placeholder='imagem'>
          <br>
          <input type='submit' name='submitNovoProduto'>
        </form>
      </div>
    ";



    if (isset($_POST['submitNovoProduto'])) {
      $pasta_imagem = '../produtos/';
      $arquivo_imagem = $pasta_imagem . basename($_FILES['imagem']['name']);
      $tipoArquivo = strtolower(pathinfo($arquivo_imagem, PATHINFO_EXTENSION));
      $check = getimagesize($_FILES['imagem']['tmp_name']);
      if ($check !== false) {
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        $sqlAdmin = "INSERT INTO produtos(preco, descricao, img_url) VALUES 
                      ({$preco}, '{$descricao}', '{$arquivo_imagem}')";



        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo_imagem)) {
          echo 'enviado';
          mysqli_query($conn, $sqlAdmin);
          unset($_POST['submitNovoProduto']);
        } else {
          echo 'falha em enviar' . $arquivo_imagem;
        }
      } else {
        echo "não é imagem";
      }
    }
  }


  ?>
  <!-- <div id="site"> -->
  <div id="container">

    <?php
    $sql = "SELECT id, preco, descricao, img_url FROM produtos order by preco desc";
    //EXECUTA o codigo sql
    $select = mysqli_query($conn, $sql);

    while ($produto = mysqli_fetch_assoc($select)) {
      $id = $produto['id'];
      $img_url = $produto['img_url'];
      $descricao = $produto['descricao'];
      $preco = number_format($produto['preco'], 2, ',', '.');
      $opcoesAdm = '';
      if (isset($_SESSION["user"]) and $_SESSION["user"] == "admin") {
        $opcoesAdm = <<<END
        <!-- TRES PONTINHOS -->
        <button id='p3' onclick="drop('opcoes')"></button>
        
        <form method='post' enctype='multipart/form-data'>
          <div id='opcoes' class='dropdown options'>
            <ul>
              <li class='option'> <!-- EDITAR ITEM -->
                <button type='button' id='btnEdit' onclick="drop('edit')">Editar Item</button>
              </li>
              <li class='option'> <!-- DELETAR ITEM -->
                <button type='submit' name='delete' id='btnDel'>Apagar Item</button>
              </li>
            </ul>
          </div>
          <div id='containerEdit'>
            <div id='edit' class='dropdown telaEditar'>
              <input type='number' name='precoEdit' placeholder='preço' step='0.01'> <br>
              <input type='text' name='descricaoEdit' placeholder='descrição'><br>
              <!-- <label for='imagem'>Imagem:</label><input type='file' name='imagemEdit' placeholder='imagem'> -->
              <!-- <br> -->
              <input type='submit' name='submitEditProduto'>
            </div>
          </div>
        
          <!-- ID do produto -->
          <input type='hidden' value='{$id}' name='idProduto'>
        </form>
        END;
      }

      echo "
        <div class='card'>
          {$opcoesAdm}
          <img id='imagemProduto' src='{$img_url}' />
          <div>
            <h2>{$descricao}</h2>
            <p class='valor'>R\${$preco}</p><br>
            <button id='comprar'>Comprar</button>
          </div>
        </div>
        
      ";
    }
    ?>

  </div>







  <!-- </div> -->

</body>

</html>
<script src="../js/home.js"></script>