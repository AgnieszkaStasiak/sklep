<?php

require_once '../../connection.php';


// Retrieve data from Query String
$obud = $_GET['obud'];
$zasSpr = array();
//SELECT umożliwiający wydobycie odpowiednich płyt w powiązaniu do grup Obudowy
$grupaZ = $pdo->prepare("Select * From ListaGrup");
$grupaZ->execute();
?>


<label for="zasilacz">Zasilacz</label><br>

<select  class="btn btn-primary  btn-block" id="zasilacz" onchange="myFunctionZ()">
    <option value="">-- wybierz --</option>
    <?php
    foreach ($grupaZ as $row) {
        if ($row[idProdukt] == $obud) {

            $zasilacz = $pdo->prepare("select * From Kategoria as K inner Join Produkt as P
on K.Produkt_idProdukt = P.idProdukt inner Join ListaGrup as LG
on P.idProdukt = LG.idProdukt WHERE NazwaK = 'Zasilacz'and LG.idGrupaProduktow = $row[idGrupaProduktow]");
            $zasilacz->execute();

            foreach ($zasilacz as $row) {
                
             if(in_array($row['Nazwa'], $zasSpr)){  }
   else{    
                
                
                echo("<option value=\"" . $row['idProdukt'] . "\">" . $row['Nazwa'] . "</option>");
                 $zasSpr[]= $row['Nazwa'] ;   
            }
            }
            $zasilacz->closeCursor();
        }
    }
    ?>
</select>

<div class="ZasilaczBox">
<?php
$zasilaczG = $pdo->prepare("select * From Kategoria as K inner Join Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Zasilacz'");
$zasilaczG->execute();
foreach ($zasilaczG as $row) {
                                
                            echo"<div id=\"content\">";
                            echo("<div id = \"" . $row['idProdukt'] . "\" class=\"zasilacz\" style=\"display: none\">");
                            echo "<br>";
                            echo "<div class=\"panel panel-info\">";
                            echo "<div class=\"panel-heading\">";
                            echo "".$row['Nazwa']."";
                              echo"</div>";
                               echo "<div class=\"panel-boody\">";
                            echo "Opis: <br>". $row['Opis']."<br>";
                            echo"</div>";
                             echo "<div class=\"panel-footer\">";
                            echo "cena: ". $row['Cena']."zł.</br>";
                           echo"</div>";
                            
                               echo"</div>";
                                echo"</div>";
                               echo"</div>";
//    echo("<div id = \"" . $row['idProdukt'] . "\" class=\"zasilacz\"style=\"display: none\">" . $row['Nazwa'] . " " . $row['Cena'] . " " . $row['Opis'] . "</div>");
}
?>
</div>  