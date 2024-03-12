<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href="a.php">hehe</a>
    <form action="a.php" method="post">
        <input type="text" name="f">
        <input type="submit" value="enviar" name="enviar">
    </form>
    <form action="index.php" method="post">
        <input type="text" name="c">
        <input type="submit" value="av" name="av">
        <?php
            if(isset($_POST['enviar'])){
                $_SESSION['a'] = $_POST['f'];
            }
            if(isset($_POST['av'])){
                $_SESSION = [];
                header("Location: a.php");
            } 
        ?>
    </form>
</head>
<body>
    
</body>
</html>