                        

<?php
require_once '../../connection.php'; 

// Retrieve data from Query String
$plytaGlow = $_GET['plyglo'];
$PaSp = array();
$grupaPa = $pdo->prepare("Select * From ListaGrup;");
$grupaPa->execute();


        ?>

        
                                 
                                <label for="Pamiec">Pamięć</label><br>
                                
                                       <select  class="btn btn-primary btn-block" id="pamiec" onchange="myFunctionPa()">
                                     <option value="">-- wybierz --</option>


        <?php
        //SELECT umożliwiający wydobycie odpowiednich płyt w powiązaniu do grup Obudowy


    
   $query = "select distinct P.idProdukt, P.Nazwa From Kategoria as K 
     inner Join Produkt as P on K.Produkt_idProdukt = P.idProdukt 
inner Join ListaGrup as LG
on P.idProdukt = LG.idProdukt WHERE NazwaK = 'Pamięć'";

        $pamiec = $pdo->prepare($query);
        $pamiec->execute();




foreach ($grupaPa as $row) {

    if ($row['idProdukt'] == $plytaGlow) {

        
        foreach ($pamiec as $row1) {
   if(in_array($row['Nazwa'], $PaSpr)){  }
   else{

            echo("<option value=\"" . $row1['idProdukt'] . "\">" . $row1['Nazwa'] . "</option>");
             $PaSpr[]= $row['Nazwa'] ;   
   }
        }
    }
}

?>
                    </select>

<div class="PamiecBox">
<?php
$pamiecG = $pdo->prepare("select * From Kategoria as K inner Join Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Pamięć'");
$pamiecG->execute();
foreach ($pamiecG as $row) {
                                 echo"<div id=\"content\">";
                            echo("<div id = \"" . $row['idProdukt'] . "\" class=\"pamiec\" style=\"display: none\">");
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
    
}
?>
</div>  