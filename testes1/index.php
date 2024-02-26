<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            line-height: 1.5;
        }
        body{
            background-image: linear-gradient(#82adf2, #112670 );
            background-attachment: fixed;
            
        }
        div.corpo{
            padding: 25px;
            width: 50%;
            height: 50%;
            text-align: center;
            margin: 10% auto 10%;
            
            background-color: #d8d8ff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    
    <div class="corpo">
        <form action="index.php" method="post">
            <label>nome de usuário</label><br>
            <input type="text" name="username"><br>
            <label>senha</label><br>
            <input type="password" name="senha"><br>
            <input type="submit" value="login">
        </form>
    </div>
</body>
</html>
<?php
    if($_POST){
        echo $_POST["username"] . "<br>";
        echo $_POST["senha"] . "<br>";
    }
        

?>