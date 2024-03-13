<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<p>oxiii</p>
    <?php
        exec('python ./python.py', $output);
        echo $output[0];
    ?>
</body>
</html>