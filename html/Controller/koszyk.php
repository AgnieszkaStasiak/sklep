
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
        <link href=".../Content/css/style.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <script src=".../Content/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../plik.js"></script>
        

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">"Sklep"</a>

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
                    <!--<a href="../Controller/koszyk.php">Koszyk</a>-->
                        </li>
                       <li>
                    <!--<a href="../Controller/logout.php">Wyloguj</a>-->
                        </li>
                    </ul>
                </div>
            </div>       

        </nav>



        <div class="container-fluid" style="margin-top: 50px">
<?php
// Nawiązanie polaczenia z bazą danych.
//        require '../../connection.php';
//        connecti();

$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');

try {
    $pdo->query('SET NAMES utf8');
    $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Połączenie nawiązane!';
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}
session_start();

//$koszyk= array();
//$koszyk[]+"   " = $_GET['obud']+"   ";
//$_SESSION['Koszyk']+"   " = array();
//$_SESSION['Koszyk']+"   "[]+"   "=$_GET['obud']+"   ".";";
//print_r($_SESSION['Koszyk']+"   ");
//echo $_GET['obud']."   ";
//echo $_GET['plyta']."   ";
//echo $_GET['zasialcz']."   ";
//echo $_GET['procesor']."   ";
//
if ($_GET['obud'] != NULL) {
    $_SESSION['obud'][] = $_GET['obud'];
    $_SESSION['plyta'][] = $_GET['plyta'];
     
    $_SESSION['zasilacz'][] = $_GET['zasilacz'];
    $_SESSION['procesor'][] = $_GET['procesor'];
     
    $_SESSION['pamiec'][] = $_GET['pam'];
     
}

echo "Zawartość koszyka <br>";

$ilosc = count($_SESSION['obud']);

for ($n = 0; $n <= count($_SESSION['obud']); $n++) {
    $obudo = $_SESSION['obud'][$n];
     if($obudo){
    $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $obudo");
    $db->execute();
    $obudo = $db->fetchColumn(0);
//  
//     $db = $pdo->prepare("SELECT Cena FROM Produkt WHERE idProdukt = $obudo");
//    $db->execute();
//    $obuCena = $db->fetchColumn(0);
    
      echo "Obudowa:  ".$obudo."_||_ ";
   //   print_r($ObuCen);
      //echo "Cena = " .$obuCena." ";
     }  
//      
    $plyt = $_SESSION ['plyta'][$n];
    if($plyt){
        $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $plyt");
        $db->execute();
        $NaPlyt = $db->fetchColumn(0);
        echo  "Płyta:  ".$NaPlyt."_||_  ";
    }

    
    $zasilacz = $_SESSION['zasilacz'][$n];
if($zasilacz){

      $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $zasilacz");
        $db->execute();
       $NaZasi = $db->fetchColumn(0);
        //print_r($db);  
         echo  "Zasilacz:  ". $NaZasi. "_||_ ";  

}
     
    
    $procesor = $_SESSION['procesor'][$n];
    if($procesor){

      $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $procesor");
        $db->execute();
       $NaPro = $db->fetchColumn(0);
        //print_r($db);  
         echo  "Procesor:  ". $NaPro. " _||_ "; 
    }
    $pamiec = $_SESSION['pamiec'][$n];
    if($pamiec){

      $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $pamiec");
        $db->execute();
       $NaPam = $db->fetchColumn(0);
        //print_r($db);  
         echo  "Pamięć:  ". $NaPam. "  "; 
    }

    echo "<br>";
}
//
//session_destroy();
?>


        <a href="resetKosz.php"> <button>Zresetuj Koszyk</button></a>
     
        </div>
        
        </body>
</html>



<!--http://127.0.0.1/sklep/html/Controller/koszyk.php?obud=241&plyta=284&zasialcz=292&procesor=290&pam=288-->