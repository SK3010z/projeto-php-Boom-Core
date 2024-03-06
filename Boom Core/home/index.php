<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="header">
        <span id="headerL">
            <span class="logo"><a class="logo" href="./"><img src="../assets/boom core.png" alt=""></a></span>
            <span id="boom"><a href="./">Boom Core</a></span>
        </span>
        <span id="headerR">

            <!-- produtos -->
            <a id="produtos" href="./" onmouseover="start('traco1')" onmouseleave="end('traco1')"><p>Produtos</p><div id="traco1"></div></a>

            <!-- serviços  -->
            <a id="servicos" href="./" onmouseover="start('traco2')" onmouseleave="end('traco2')"><p>Serviços</p><div id="traco2"></div></a>

            <!-- atendimentos -->
            <a id="atendimentos" href="./" onmouseover="start('traco3')" onmouseleave="end('traco3')"><p>Atendimentos</p><div id="traco3"></div></a>

            <!-- pesquisa  -->
            <form action="index.php" id="pesquisa" method="get">
                <!-- caixa de pesquisa  -->
                <input type="text" placeholder="Pesquisa" name="pesquisa">
                <!-- botao de pesquisar  -->
                <input type="submit" id="botao" value="" title="pesquisar">
            </form>

            <!-- botao de usuario  -->
            <a href="index.php"><img id="user" src="../assets/user.png" title="Perfil do usuário"/></a>
            
            <!-- notificações  -->
            <a href="index.php"><img id="notificacao" src="../assets/sino.png" title="Notificações"/></a>
        </span>
    </div>

    <script src="script.js"></script>
</body>
</html>