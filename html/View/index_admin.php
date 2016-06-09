<?php
session_start();


if(isset($_SESSION['Zalogowany'])&& $_SESSION['Zalogowany']== TRUE){
    header('Location:index_uzytkownik.php');
     exit();
}
?>

<!DOCTYPE html>

<html>

<head>

     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sklep internetowy</title> 
	<link href="../Content/css/bootstrap.min.css" rel="stylesheet">
         <script src="../Content/js/bootstrap.min.js"></script>
</head>

<body>

  
  	 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">"Sklep"</a>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Rozwiń nawigację</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../../index.php">Home</a>
                    </li>
                   <li>
                        <a href="addProdukt.php">Dodaj produkt</a>
                    </li>
                     <li>
                         <a href="../Controller/logout.php">Wyloguj</a>
                    </li>
                  
                </ul>
                 
            </div>
        </div>
    </nav>
      
    <br>
    <br>
    <br>
    <?php
    session_start();
 
                  ?> 
</body>

</html>