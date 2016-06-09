<?php

session_start();	//otwieram sesję	
//if(!isset($_SESSION['koszyk']))	//jezeli sesja po raz pierwszy otwarta	
//{		$_SESSION['koszyk']=array();	//czyść koszyk	
//}	if(isset($_GET['item']))	
//{		//dodajemy gitarę do koszyka		
//$_SESSION['koszyk'][]=$_GET['item'];		//przekierowanie z uwzględnieniem nie działających ciasteczek		
//header('location: ' . $_SERVER['PHP_SELF'] . '?' . SID);				

$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');

try {
    $pdo->query('SET NAMES utf8');
    $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Połączenie nawiązane!';
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}

if(isset($_SESSION['ZalogowanyAdmin'])&& $_SESSION['ZalogowanyAdmin']== TRUE){
    header('Location:html/View/index_admin.php');
    exit();
}
if(isset($_SESSION['Zalogowany'])&& $_SESSION['Zalogowany']== TRUE){
    header('Location:html/View/index_uzytkownik.php');
     exit();
}
$_SESSION['NZalogowany']=TRUE;



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sklep internetowy</title> 
        <link href="html/Content/css/bootstrap.min.css" rel="stylesheet">
        <link href="html/Content/css/style.css" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <script src="html/Content/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="plik.js"></script>
        

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">"Sklep"</a>

                <div class="navbar-header">
                    <div class="btn-group">
                        <button type="button" class="navbar-toggle btn btn-default dropdown-toggle" data-toggle="collapse dropdown #bs-example-navbar-collapse-1">
                            <span class="sr-only">Rozwiń nawigację</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>    
                        </button>

                    </div>  
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      
                        <li>
                            <a href="html/View/rejestracja.php">Rejestracja</a>
                        </li>
                        <li>
                            <a href="html/View/logowanie.php">Logowanie</a>
                        </li>
                    </ul>
                </div>
            </div>       

        </nav>



        <div class="container-fluid" style="margin-top: 50px">




            <div class="col-md-8"> 
                <br>

                Złóż swój własny komputer.  
                <br>
                <br>


                <form method="POST" action="">

                    <label for="obudowa">Obudowa</label><br>
                    <!--Dodawanie Obudowy-->
                    <select id="Obu" name="Obud" onchange="myFunctionO(), ajaxFunction(), ajaxFunctionZ()">
                        <option value="">-- wybierz --</option>
                        <?php
                        $obudowa = $pdo->prepare("select * From mydb.Kategoria as K inner Join mydb.Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Obudowa'");
                        $obudowa->execute();

                        foreach ($obudowa as $row) {
                            echo("<option value=\"" . $row['idProdukt'] . "\">" . $row['Nazwa'] . "</option>");
                        }
                        $obudowa->closeCursor();
                        ?>
                    </select>

                    <div class="ObudowaBox">
                        <?php
                        $dane = $pdo->prepare("select * From mydb.Kategoria as K inner Join mydb.Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Obudowa'");
                        $dane->execute();

                        foreach ($dane as $row) {
                            echo("<div id = \"" . $row['idProdukt'] . "\" class=\"obudowa\" style=\"display: none\">" . $row['Nazwa'] . " " . $row['Cena'] . " " . $row['Opis'] . "</div>");
                        }
                        ?>
                    </div>  

                <!--Początek wybierania płyty-->


                    <div id = 'PlyGluDiv'> 
                        <br>
                        <label for="plyta">Płyta główna</label><br>
                        <select id="plytaG" onchange="myFunctionPG()">
                            <option value="">-- wybierz --</option>
                        </select></div> 

                   

                    <!--Koniec wybierania Płyty-->


                    <br>
                    <!--Początek wybierania zasilacza-->


                    <div id = 'zasilaczDiv'> 

                        <label for="zasilacz">Zasilacz</label><br>
                        <select name="zasilacz" id="zasilacz" onchange="myFunctionZ()">
                            <option value="">-- wybierz --</option>
                        </select>

                    </div>  


                    <!--Koniec wybierania zasilacza-->
                    <br>

                    <!--Początek wybierania Procesora na podstawie danych z Płyty Głównej-->


                    <div id = 'ProcesorDiv'> 

                        <label for="procesor">Procesor</label><br>
                        <select name="procesor" id="procesor">
                            <option value="">-- wybierz --</option>
                        </select>
                    </div>
                    <script>

                    </script>
                    <!-- Koniec wybierania Procesora                          -->

                    <br>

                    <!--Pocztek wybeirania Pamięci na podstawie danych z Płyty Głównej  -->
                    <div id = 'PamiecDiv'> 
                        <label for="pamiec">Pamięć</label><br>
                        <select name="pamiec" id="pamiec">
                            <option value="">-- wybierz --</option>
                        </select>
                    </div>

                    <script>
  
                    </script>
                    </br>
                    <!--Koniec wybierania Pamięci-->
                </form>


            </div>   

        </div>


     
    </body>
</html>

