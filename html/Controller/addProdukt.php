<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sklep internetowy</title> 
        <link href="html/Content/css/bootstrap.min.css" rel="stylesheet">
        <link href="html/Content/css/style.css" rel="stylesheet">
        <script src="html/Content/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    </head>
    <body>



        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');

        try {
            $pdo->query('SET NAMES utf8');
            $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'Połączenie nawiązane!';
        } catch (PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }

        $nazwa = $_POST['NazwaP'];

        $iloscSztuk = $_POST['iloscSztuk'];
        $opis = $_POST['opis'];
        $cena = $_POST['cena'];
        $kategoria = $_POST['kategoria'];
        $kategoria1 = $_POST['kategoria1'];

//Dodawanie Produktu
        $pdo->exec("INSERT INTO Produkt (Nazwa, iloscSztuk, Opis, Cena) VALUES ('$nazwa','$iloscSztuk','$opis','$cena')");
//Wydobywanie id nowo dodanego produktu
        $pr = $pdo->prepare("SELECT idProdukt FROM mydb.Produkt ORDER BY idProdukt DESC LIMIT 1");
        $pr->execute();

        $idPr = $pr->fetchColumn(0);


//Dodawanie Kategori do Produktu
        $pdo->exec("INSERT INTO Kategoria (NazwaK, Produkt_idProdukt) VALUES ('$kategoria','$idPr')");
        
//Dodawanie nowej kategori
        if($kategoria1!=''){
       
            $pdo->exec("INSERT INTO Kategoria (NazwaK, Produkt_idProdukt) VALUES ('$kategoria1','$idPr')");
         
        }
        

// Dodawanie istniejących grup do produktu

        $gru = $pdo->prepare("select * From mydb.GrupaProduktow");
        $gru->execute();
        
        
        $i = 1;
//
//  echo "<br>";
//            echo "<br>";

        
      $db = $pdo->prepare("SELECT idGrupaProduktow FROM mydb.ListaGrup ORDER BY idGrupaProduktow DESC LIMIT 1");
        $db->execute();  
         $idGR = $db->fetchColumn(0);
 
        
        for($i;$i<=$idGR;$i++){
        
    if (isset($_POST[$i])) {
       
               
          
                  echo '<br>'.$i;
              
                
                $pdo->exec("INSERT INTO ListaGrup (idProdukt, idGrupaProduktow) VALUES ('$idPr','$i')");

            
                //Przypisywanie grup do konkretnego produktu.
            
           
        }
        }
// Dodawanie Nie istniejącej grupy do bazy danych
// Przypisanei grupy do Produktu.
        $licz = $_POST['licz'];

        for ($k = 1; $k <= $licz; $k++) {

            $G = 'N' . $k;
            $GK = $_POST[$G];
            if ($GK != '') {
                echo $GK;
                //Dodawanie Nowej grupy do bazy danych    
                $pdo->exec("INSERT INTO mydb.GrupaProduktow (NazwaG) VALUES ('$GK')");
                //Pobieranie idGrupy nowo dodanej grupy
                $gr = $pdo->prepare("SELECT idGrupaProduktow FROM mydb.GrupaProduktow ORDER BY idGrupaProduktow DESC LIMIT 1");
                $gr->execute();
                $idGrP = $gr->fetchColumn(0);

//        //Dodanie Produktu do grupy.Lub Grupy do produktu.
                $pdo->exec("INSERT INTO mydb.ListaGrup (idProdukt, idGrupaProduktow) VALUES ('$idPr','$idGrP')");
            }
        }
//echo $licz;
// print_r($_POST);       
//
//$result = $pdo->prepare("SELECT Zdjecie FROM Produkt WHERE idProdukt='3'");
//
// $result->execute();
//$zdie = $result->fetchColumn(0);
//
//$zdjecie=base64_decode($zdie);
//echo $zdjecie."<br>";
//echo '<img src="'.$zdjecie . '" />'; 
        ?>       
    </body>
</html>
