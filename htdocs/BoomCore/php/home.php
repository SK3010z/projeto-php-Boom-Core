<?php
session_start();
include("./assets/conn.php");

if (isset($_COOKIE["session"])) {
  $session_Cookie = explode(" ", $_COOKIE["session"]);
  $_SESSION["user"] = $session_Cookie[0];
  $_SESSION["senha"] = $session_Cookie[1];
  $_SESSION["email"] = $session_Cookie[2];
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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/compra.css">
  <script src="../js/jquery.js"></script>


</head>

<body>
  <div id="fundo-compra" style="display: none;">
    <div class="product-page">
      <div class="product-gallery">
        <div class="main-image">
          <img src="https://m.media-amazon.com/images/I/71irWztV+qL.jpg" alt="Main Product Image">
        </div>
        <div class="thumbnail-images">
          <img src="https://i5.walmartimages.com/asr/80b3555b-e4b2-4897-8414-c8e46a7f0db5.4504ee614109b02150cd9f478a7b260d.jpeg?odnWidth=1000&odnHeight=1000&odnBg=ffffff" alt="Thumbnail 1">
          <img src="https://compujordan.com/image/cache/catalog/products/rampage/Cooler/5-1200x1200.jpg" alt="Thumbnail 2">
          <img src="https://tse1.mm.bing.net/th?id=OIP.UA1eF6qEDFBhCvI55I_GxAHaHg&pid=Api&P=0&h=180" alt="Thumbnail 3">
        </div>
      </div>
      <div class="product-details">
        <div class="prod-titu">
          <h1>
            Cooler Master Hyper 212 RGB Black Edition CPU Air Cooler, SF120R
            RGB Fan, 4 CD 2.0 Heatpipes, Anodized Gun-Metal Black, Brushed
            Nickel Fins, RGB Lighting for AMD Ryzen/Intel LGA1151
          </h1>
        </div>
        <div class="product-price">
          <span class="valor">R$ 120,00</span>
        </div>
        <div class="purchase-options">
          <button class="buy-now">Comprar</button>
          <button class="add-to-cart">Adicionar ao Carrinho</button>
        </div>
        <div class="product-description">
          <p>Cooler muy cool</p>
          <p>turbina de avião</p>
        </div>
      </div>
    </div>
  </div>

  <?php include("./assets/header.php"); ?>


  <form action="" method="get">

  </form>


  <?php
  if (isset($_SESSION["user"])) {
    echo "<h1 style='font-size: xx-large; text-align: center; margin: 20px 0'>Seja bem-vindo <b style='font-weight: bold'>{$_SESSION['user']}</b>!</h1>";
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

  <h1 id='titulo'>Produtos</h1>
  <?php
  $sql = "SELECT id, preco, descricao, img_url FROM produtos ";
  //EXECUTA o codigo sql



  //PESQUISA

  echo <<<HTML
    <div id='container'>
  HTML;

  if (isset($_GET['pesquisa'])) {
    if (!empty($_GET['promptPesquisa'])) {
      //obtém a pesquisa
      $pesquisa = trim($_GET['promptPesquisa']);
      // aplica a condição da pesquisa no sql 
      $sql = $sql . "WHERE descricao LIKE '%{$pesquisa}%' ";
      echo <<<HTML
        <div style='text-align: left'>
          <h1 id='resultados' 
          style="font-size: 25px; text-align: left; margin: 15px 0;"
          ><!-- alterado pelo jquery dps --></h1>
        </div>
      HTML;
    }
  }
  $select = mysqli_query($conn, $sql);

  echo <<<HTML
    <script>
      
    </script>
    <div id="produtos">
  HTML;

  $count = 0;
  while ($produto = mysqli_fetch_assoc($select)) {
    //Informações dos PRODUTOS
    $id = $produto['id'];
    $img_url = $produto['img_url'];
    $descricao = $produto['descricao'];
    $preco = number_format($produto['preco'], 2, ',', '.');
    //vazio pra CASO NAO for ADMIN, NAO MOSTRAR NADA
    $opcoesAdm = '';
    //IDs das telas de desenvolvedor dos produtos
    $opcoesId = "opcoes{$count}";
    $editId = "edit{$count}";
    $classeP = "produto{$count}";
    $count++;
    if (isset($_GET['pesquisa'])) {
      if (!empty($_GET['promptPesquisa'])) {
        echo <<<HTML
          <script>
              $("#resultados").html('Mostrando {$count} resultados para "<b>{$pesquisa}</b>":');
          </script>
        HTML;
      }
    }

    if (isset($_SESSION["user"]) and $_SESSION["user"] == "admin") {
      $opcoesAdm = <<<HTML
          <!-- TRES PONTINHOS -->
          <button  id='p3' onclick="drop('{$opcoesId}','{$classeP}', '{$editId}')"></button>
          
          <form method='post' enctype='multipart/form-data'>
            <div id='{$opcoesId}' class='dropdown options'>
              <ul>
                <li class='option'> <!-- EDITAR ITEM -->
                  <button type='button' id='btnEdit' onclick="drop('{$editId}','{$classeP}')">Editar Item</button>
                </li>
                <li class='option'> <!-- DELETAR ITEM -->
                  <button type='submit' name='delete' id='btnDel'>Apagar Item</button>
                </li>
              </ul>
            </div>
            <div id='containerEdit'>
              <div id='{$editId}' class='dropdown telaEditar'>
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
        HTML;
    }

    echo <<<HTML
        <div class='card {$classeP}'>
          {$opcoesAdm}
          <img class='imagemProduto' src='{$img_url}' />
          <div>
            <h2 title='{$descricao}'>{$descricao}</h2>
            <p class='valor'>R\${$preco}</p><br>
            <button class='comprar'>Comprar</button>
          </div>
        </div>
      HTML;
  }
  ?>
  </div> <!-- produtos -->
  </div> <!-- container -->






  <!-- </div> -->
</body>

</html>
<script src="../js/home.js">
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->