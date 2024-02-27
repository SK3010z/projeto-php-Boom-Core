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
        <span class="logo"><a class="logo" href="./"><img src="boom core.png" alt=""></a></span>
        <span id="boom"><a href="./">Boom Core</a></span>
        <a id="produtos" href="./" onmouseover="start('traco1')" onmouseleave="end('traco1')"><p>Produtos</p><div id="traco1"></div></a>
        <a id="servicos" href="./" onmouseover="start('traco2')" onmouseleave="end('traco2')"><p>Serviços</p><div id="traco2"></div></a>
        <a id="atendimentos" href="./" onmouseover="start('traco3')" onmouseleave="end('traco3')"><p>Atendimentos</p><div id="traco3"></div></a>
        <form action="index.php" id="pesquisa" method="get">
            <input type="text" placeholder="Pesquisa" name="pesquisa">
            <input type="submit" id="botao" value="">
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>