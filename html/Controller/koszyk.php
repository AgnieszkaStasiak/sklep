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
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//
//$koszyk= array();
//$koszyk[]+"   " = $_GET['obud']+"   ";
//$_SESSION['Koszyk']+"   " = array();
//$_SESSION['Koszyk']+"   "[]+"   "=$_GET['obud']+"   ".";";
//print_r($_SESSION['Koszyk']+"   ");
//echo $_GET['obud']."   ";
//echo $_GET['plyta']."   ";
//echo $_GET['zasialcz']."   ";
//echo $_GET['procesor']."   ";

if ($_GET['obud'] != NULL) {
    $_SESSION['obud'][] = $_GET['obud'];
    $_SESSION['plyta'][] = $_GET['plyta'];
     
    $_SESSION['zasialcz'][] = $_GET['zasialcz'];
    $_SESSION['procesor'][] = $_GET['procesor'];
     
    $_SESSION['pamiec'][] = $_GET['pam'];
     
}
//var_dump($_SESSION);
//    
//    echo "#######################################################\n\n\n";
//    print_r($_SESSION['obud']);
echo "Zawartość koszyka <br>";

$ilosc = count($_SESSION['obud']);

for ($n = 0; $n <= count($_SESSION['obud']); $n++) {
    $obudo = $_SESSION['obud'][$n];
    $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $obudo");
    $db->execute();
    $obudo = $db->fetchColumn(0);
    
    $obuCe = $pdo->prepare("SELECT Cena FROM Produkt WHERE idProdukt =  $obudo");
    $db->execute();
    $ObuCen = $db->fetchColumn(0); 
    
      echo $obudo."  ";
//      
    $plyt = $_SESSION ['plyta'][$n];
    if($plyt){
        $db = $pdo->prepare("SELECT Nazwa FROM Produkt WHERE idProdukt = $plyt");
        $db->execute();
        $NaPlyt = $db->fetchColumn(0);
        echo  $NaPlyt."  ";
    }
    //echo "plyt=".$plyt."!\n";

  //        
//    
//    $NazPlyt = $pdo->prepare("SELECT Cena FROM Produkt WHERE idProdukt =  $plyt");
//    $NazPlyt->execute("SELECT Cena FROM Produkt WHERE idProdukt =  $plyt");
//    $PlytNazw = $NazPlyt->fetchColumn(0);
    //   $PlytNazw = $NazPlyt->fetch();
//     var_dump($NaPlyt);
//      print_r($NaPlyt);
////    
    $zasilacz = $_SEESION['zasilacz'][$n];
    $procesor = $_SESSION['procesor'][$n];
    $pamiec = $_SESSION['pamiec'][$n];
//  ;
//      echo $obudo."  ";
//      echo $
    // echo $ObuCen . " ";
//echo $cenaObu."  ";
//echo $PlytNazw. "<br>";
//echo $zasilacz;
//echo $procesor;
//echo $pamiec;
}
?>



<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sklep internetowy</title> 
        <link href="html/Content/css/bootstrap.min.css" rel="stylesheet">
        <link href="html/Content/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="html/Content/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="html/Content/css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <script src="html/Content/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="plik.js"></script>


    </head>
    <body>

        <button onClick = "reset()"></button>

    </body>
</html>



<!--http://127.0.0.1/sklep/html/Controller/koszyk.php?obud=241&plyta=284&zasialcz=292&procesor=290&pam=288-->