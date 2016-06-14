<?php
session_start();
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
    header('Location:index_admin.php');
    exit();
}
if (!isset($_SESSION['Zalogowany']) && $_SESSION['Zalogowany'] == FALSE) {
    header('Location:../../index.php');
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
         <link href="../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/style.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <script src="../Content/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../plik.js"></script>
        

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
      <a class="navbar-brand" href="index_uzytkownik.php">"Twój Komputer"</a>
    </div>

    <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="../View/logout.php">Wyloguj</a></li>
             <li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                    <a href="../Controller/koszyk.php">Koszyk</a>
                        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

        <div class="container-fluid">




            <div class="col-md-12"> 
            

                <h2> Złóż swój własny komputer:  </h2>
                <br>
                <br>


                <form method="POST" action="" id = "Produkty">

                    <label for="obudowa">Obudowa</label><br>
                    <!--Dodawanie Obudowy-->
                    <select class="btn btn-primary btn-block form-control" id="Obu" name="Obud" onchange="myFunctionO(), ajaxFunction(), ajaxFunctionZ(),ajaxFunctionPr(), ajaxFunctionPa()">
                     
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
          
                            
                            echo"<div id=\"content\">";
                            echo("<div id = \"" . $row['idProdukt'] . "\" class=\"obudowa\" style=\"display: none\">");
                            echo "<br>";
                            echo "<div class=\"panel panel-info\">";
                            echo "<div class=\"panel-heading\">";
                            echo "".$row['Nazwa']."";
                              echo"</div>";
                               echo "<div class=\"panel-boody\">";
                            echo "Opis: <br>". $row['Opis']."<br>";
                            echo"</div>";
                             echo "<div class=\"panel-footer\">";
                            echo "cena: ". $row['Cena']."zł</br>";
                           echo"</div>";
                            
                               echo"</div>";
                                echo"</div>";
                               echo"</div>";
                            }
                        ?>
               
                    </div>  

                <!--Początek wybierania płyty-->


                    <div id = 'PlyGluDiv'> 
                        <br>
                        <label for="plyta">Płyta główna</label><br>
                        <select  class="btn btn-primary  btn-block" id="plytaG" onchange="myFunctionPG()">
                            <option value="">-- wybierz --</option>
                        </select></div> 

                   

                    <!--Koniec wybierania Płyty-->


                    <br>
                    <!--Początek wybierania zasilacza-->


                    <div id = 'zasilaczDiv'> 

                        <label for="zasilacz">Zasilacz</label><br>
                        <select  class="btn btn-primary  btn-block" name="zasilacz" id="zasilacz" onchange="myFunctionZ()">
                            <option value="">-- wybierz --</option>
                        </select>

                    </div>  


                    <!--Koniec wybierania zasilacza-->
                    <br>

                    <!--Początek wybierania Procesora na podstawie danych z Płyty Głównej-->


                    <div id = 'ProcesorDiv'> 

                        <label for="procesor">Procesor</label><br>
                        <select  class="btn btn-primary  btn-block" name="procesor" id="procesor">
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
                        <select  class="btn btn-primary  btn-block" name="pamiec" id="pamiec">
                            <option value="">-- wybierz --</option>
                        </select>
                    </div>

                    <script>
  
                    </script>
                    </br>
                    <!--Koniec wybierania Pamięci-->
                    
                 
                    <br>
                    
                    
                   <button class="btn btn-success" onClick="ajaxFunctionKosz(); return false;" >Do koszyka</button>
         

                </form>
                </br>
                <script type="text/javascript">
                    
                          function ajaxFunctionKosz() {
                var ajaxRequest;  // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }



                var obud = document.getElementById('Obu').value;
                var plyta = document.getElementById('plytaG').value;
                var zasilacz = document.getElementById('zasilacz').value;
                var pam = document.getElementById('pamiec').value;
                var procesor = document.getElementById('procesor').value;

                var queryString = "?obud=" + obud +"&plyta=" + plyta + "&zasilacz=" + zasilacz + "&procesor=" + procesor +"&pam=" + pam; 

                ajaxRequest.open("GET", "../Controller.koszyk.php" + queryString, true);

                ajaxRequest.send(null);
            }    
                    </script>
             
            </div>   

        </div>

        </div>
   <footer class="footer">...</footer>  
    </body>
</html>

