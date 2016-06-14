
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


?>
<br>
<label for="plyta">Płyta główna</label><br>
<!--  //SELECT umożliwiający wydobycie odpowiednich płyt w powiązaniu do grup Obudowy                        -->
<select  class="btn btn-primary  btn-block" id="plytaG" onchange="myFunctionPG(), ajaxFunctionPr(), ajaxFunctionPa()">
    <option value="">-- wybierz --</option>

<?php  
// Retrieve data from Query String
$obud = $_GET['obud'];
$obuSpr = array(); 
$grupaO = $pdo->prepare("Select * From mydb.ListaGrup");
$grupaO->execute();



foreach ($grupaO as $row) {
    if ($row[idProdukt] == $obud) {
        $plyta = $pdo->prepare("select distinct P.idProdukt, P.Nazwa, LG.idGrupaProduktow  From mydb.Kategoria as K inner Join mydb.Produkt as P
on K.Produkt_idProdukt = P.idProdukt inner Join mydb.ListaGrup as LG
on P.idProdukt = LG.idProdukt WHERE NazwaK='Płyta Główna' AND LG.idGrupaProduktow = '$row[idGrupaProduktow]'");

//  wyszukiwanie odpowiedniej grupy dla podanje Obudowy      

        $plyta->execute();
     
 foreach ($plyta as $row) {
//   for($obuSpr as $row2) { 
// if($row2 != $row['Nazwa']){  
//$key = array_search($row[Nazwa], $obuSpr);
   
if(in_array($row['Nazwa'], $obuSpr)){
  
 }
 else{
   
      echo("<option value=\"" . $row['idProdukt'] . "\">" . $row['Nazwa'] . "</option>");
          $obuSpr[]= $row['Nazwa'] ;   
          
 }  
        
//}
          }
        
 
   }
}
//}

?>   

</select>

<div class="PlytaBox">
    <?php
    $plytaGl = $pdo->prepare("select * From mydb.Kategoria as K inner Join mydb.Produkt as P on K.Produkt_idProdukt= P.idProdukt WHERE NazwaK = 'Płyta Główna'");
    $plytaGl->execute();
    foreach ($plytaGl as $row) {
                                  echo"<div id=\"content\">";
                            echo("<div id = \"" . $row['idProdukt'] . "\" class=\"plyta\" style=\"display: none\">");
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