<?php
   $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');

    try {
        $pdo->query('SET NAMES utf8');
        $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Połączenie nawiązane!';
    } catch (PDOException $e) {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }


?>






<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Content/css/bootstrap.min.css" rel="stylesheet">

        <title>
            Wyniki
        </title>
    </head>

    <body>

  Rejstracja powiodła się 
  
    </body>
</html>    
