<?php
session_start();


if (isset($_SESSION['Zalogowany']) && $_SESSION['Zalogowany'] == TRUE) {
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
        <link href="../Content/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="../Content/js/bootstrap.min.js"></script>


    </head>

    <body>

        <div class="zawartosc">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Rozwiń nawigację</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">"Twój Komputer"</a>
                    </div>

                    <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="addProdukt.php">Dodaj produkt</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../Controller/logout.php">Wyloguj</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>    


            <!--    
    

            <?php
            session_start();
            ?> 
            /<div>
                </body>

                </html>