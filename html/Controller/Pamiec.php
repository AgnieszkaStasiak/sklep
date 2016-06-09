                        

<?php
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');

try {
    $pdo->query('SET NAMES utf8');
    $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Połączenie nawiązane!';
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}


// Retrieve data from Query String
$plytaGlow = $_GET['plyglo'];
$PaSp = array();
$grupaPa = $pdo->prepare("Select * From ListaGrup;");
$grupaPa->execute();


        ?>

        
                                 
                                <label for="Pamiec">Pamięć</label><br>
                                
                                       <select id="pamiec" onchange="myFunctionPa()">
                                     <option value="">-- wybierz --</option>


        <?php
        //SELECT umożliwiający wydobycie odpowiednich płyt w powiązaniu do grup Obudowy


    
   $query = "select distinct P.idProdukt, P.Nazwa From mydb.Kategoria as K 
     inner Join mydb.Produkt as P on K.Produkt_idProdukt = P.idProdukt 
inner Join mydb.ListaGrup as LG
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
$pamiecG = $pdo->prepare("select * From mydb.Kategoria as K inner Join mydb.Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Pamięć'");
$pamiecG->execute();
foreach ($pamiecG as $row) {
    echo("<div id = \"" . $row['idProdukt'] . "\" class=\"pamiec\"style=\"display: none\">" . $row['Nazwa'] . " " . $row['Cena'] . " " . $row['Opis'] . "</div>");
}
?>
</div>  