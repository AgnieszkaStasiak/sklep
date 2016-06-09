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
?>


<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sklep internetowy</title> 
        <link href="../Content/css/bootstrap.min.css" rel="stylesheet">
        <script src="../Content/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">"Sklep"</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Rozwiń nawigację</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../../index.php">Home</a>
                        </li>
                        <li>
                            <a href="addProdukt.php">Dodaj produkt</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>
        <div class="container">

            <form method="POST" action=" ../Controller/addProdukt.php" >
                <div class="col-md-8">
                    Nazwa<br> 
                    <input type="text" class="form-control" placeholder="" value="" name="NazwaP" /><br>
                    Ilość sztuk
                    <br> 
                    <input type="text" class="form-control" value="" name="iloscSztuk" /><br>
                    <br>
                    Opis
                    <br> 
                    <textarea name = "opis" class="form-control" rows="5"></textarea><br>
                    <br>
                    <!--        Zdięcie
                            <input type="file" name="zdjecie" />
                            <br>-->

                    Cena

                    <br> 
                    <input type="text" class="form-controfl" value="" name="cena" /><br>
                    <br>
<!--Pobietanie danych aby dodać kategorie-->
                    <br>
                    <label for="kategoria">Kategoria</label><br>
                    <select name="kategoria" id="kategoria" onchange="dodajNowKa()">
                        <option value="">-- wybierz --</option>

                        <?php
                        //Wybór kategori z bazy danych
                        $kate = $pdo->prepare("SELECT * FROM mydb.Produkt as P INNER JOIN mydb.Kategoria K on K.Produkt_idProdukt=P.idProdukt GROUP BY K.NazwaK");
                        $kate->execute();

                        foreach ($kate as $row) {
                            echo("<option value=\"" . $row['NazwaK'] . "\">" . $row['NazwaK'] . "</option>");
                        }

                       
                        ?>
                        <option value="dodNo">-- Dodaj nową --</option>
                    </select> 
                    <div class="addK" id="addKate" style="display: none">
                        <br>
                        <input type="text" class="form-controfl" value="" name="kategoria1" /> 
                        <br>
                    </div>

<!--Dodawanie nowej kategori -->
                    <script>
                        function dodajNowKa() {
                            var x = document.getElementById("kategoria").value;
                            if (x == 'dodNo') {
                                $("#addKate").show();
                            }
                        }
                    </script>

                    <br>
                    <br>
                    Grupa:            

                    <?php
                    //Wybór Grupy z bazy danych
                    $gru = $pdo->prepare("select * From mydb.GrupaProduktow");
                    $gru->execute();

                    foreach ($gru as $row) {
                        //echo("<br><input name=\"grupa\" type=\"checkbox\" =\"" . $row['NazwaG'] . "\">" . $row['NazwaG'] . "");
                        echo '<br/><input type="checkbox" name="'.$row['idGrupaProduktow'].'" value="'.$row['NazwaG'].'" />'.$row['NazwaG'].'';
                    }
            
                    $gru->closeCursor();
                    ?>
                    
                    <br>
                    
                  Inna Grupa:
                  <br>
                  
            <h2><a href="#" id="addScnt">Add Another Input Box</a></h2>

<div id="NowGrup">
    <p>
        <label for="NGrup"><input type="text" id="p_scnt" size="20" name="N1" value=""/></label>
        <label for="NowGrup"><input type="hidden" name="licz" id="Dodatko" value="1" /></label>
    </p>
</div>

            <script>
                $(function() {
        var scntDiv = $('#NowGrup');
        var i = $('#NowGrup p').size() + 1;
        var j=$('#NowGrup p').size() + 1;
        $('#addScnt').on('click', function() {
                $('<p><label for="NowGrup"><input type="text" id="p_scnt" size="20" name="N' + i +'" value="" /></label></p>').appendTo(scntDiv);
                i++;
                $('<input type="hidden" name="licz" id="Dodatko" value="'+j+'" />').appendTo(scntDiv);
                j++;
                return false;
        });
        
       
});

                </script>
<!--<input type="text" style="display: non" name="licz" id="Dodatko" value="1" />    -->


                    <br>
                    <br>
                    <button type="submit" class="btn btn-default" > Dodaj !</button>       




                    <br>
                    <br>
                </div>
            </form>

        </div>


    </body>

</html>


<!--<input type="button" value="Logowanie" onClick="location.href='page.html';" />-->