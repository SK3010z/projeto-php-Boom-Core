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
    <title>Document</title>
    
    
</head>
<body>
    
    <?php include("./header.php");
    

    if (isset($_SESSION["user"])) {
        echo "true";
    }

    else{
        echo "false";
    }
    foreach ($_SESSION as $key => $value) {
        echo $key . $value . "<br>";
    }
    echo count($_SESSION) . "<br>";
    // }
    
    /*foreach ($_POST as $key => $value) {
        # code...
        echo $key . $value . "<br>";
      }*/
    ?>

    <!-- <script src="script.js"></script> -->
</body>
</html>