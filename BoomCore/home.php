<?php
  session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <?php include("./header.php");
    
    // if(isset($_SESSION)){
    if (isset($_SESSION["user"])) {
        echo "true";
        # code...
    }
    else{
        echo "false";
    }
    foreach ($_SESSION as $key => $value) {
            # code...
        echo $key . $value . "<br>";
    }
    echo count($_SESSION);
    // }
    ?>

    <!-- <script src="script.js"></script> -->
</body>
</html>