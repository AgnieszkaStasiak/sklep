<?php $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');

    try {
        $pdo->query('SET NAMES utf8');
        $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Połączenie nawiązane!';
    } catch (PDOException $e) {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }

   $plyglo = $_GET['plyglo'];
  $PrSpr = array(); // Tablica do zapisywania wybranych nazw
    //SELECT umożliwiający wydobycie odpowiednich płyt w powiązaniu do grup Obudowy
  $grupaPr = $pdo->prepare("Select * From ListaGrup");
                        $grupaPr->execute();
?>
          
                         
                        <label for="procesor">Procesor</label><br>
                     
                        <select id="procesor" onchange=" myFunctionPr()">
                             <option value="">-- wybierz --</option>
                        <?php

                        
                        foreach ($grupaPr as $row) {
                          if ($row[idProdukt] == $plyglo){  
                           $procesor = $pdo->prepare("select distinct P.idProdukt, P.Nazwa, LG.idGrupaProduktow From mydb.Kategoria as K inner Join mydb.Produkt as P
on K.Produkt_idProdukt = P.idProdukt inner Join mydb.ListaGrup as LG
on P.idProdukt = LG.idProdukt WHERE NazwaK = 'Procesor'and LG.idGrupaProduktow = $row[idGrupaProduktow]");
                        $procesor->execute();
                        
     foreach ($procesor as $row) {                    
                        
   if(in_array($row['Nazwa'], $PrSpr)){                     

   }
   else {                    
                            echo("<option value=\"" . $row['idProdukt'] . "\">" . $row['Nazwa'] . "</option>");
                         $PrSpr[]= $row['Nazwa'] ;   
                            }
                      
   }
   }
                             
                          }
                        
                        ?>
                    </select>
                        

                    <div class="ProcesorBox">
                        <?php
                        $ProcesorG = $pdo->prepare("select * From mydb.Kategoria as K inner Join mydb.Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Procesor'");
                        $ProcesorG->execute();
                        foreach ($ProcesorG as $row) {
                            echo("<div id = \"".$row['idProdukt']."\" class=\"procesor\"style=\"display: none\">" . $row['Nazwa'] . " " . $row['Cena'] . " " . $row['Opis'] . "</div>");
                            
                        }
   
                        ?>
                    </div>  