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

 if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

    // ustawienie flagi o wartosci true
    $wszystko_OK = true;
    $sprawdz = '/^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';

    $imie = $_REQUEST['Imie'];
    $imie = $_POST['Imie'];


    //Sprawdzanie czy zmienna została wporwadzona
    if ($imie == '') {
        $BrImienia = 'Pole konieczne <br> <br>';
        $wszystko_OK = false;
    } else {
        // Sprawdzanie długości imienia
        if ((strlen($imie) < 3) || (strlen($imie) > 15)) {
            $NiDlImienia = 'Imie musi posiadać od 3 do 20 znaków!<br><br>';
            $wszystko_OK = false;
        }



// Sprawdzanie składni imienia

        if (ereg($sprawdz, $imie)) {
            $NiePrDan = 'Imie może składać się tylko z liter !<br><br>';
            $wszystko_OK = false;
        }
    }



    //Sprawdzanie zmiennej nazwa
    $nazwisko = $_POST['Nazwisko'];


    //Sprawdzanie czy zmienna została wprowadzona
    if ($nazwisko == '') {
        $BrNazwiska = 'Pole konieczne <br> <br>';
        $wszystko_OK = false;
    } else {


        //Sprawdzanie długości Nazwiska
        if ((strlen($nazwisko) < 3) || (strlen($nazwisko) > 20)) {
            $wszystko_OK = false;
            $NiePrDlNa = 'Nazwisko musi posiadać od 3 do 20 znaków ! <br><br>';
        }

        //Sprawdzanie poprawnosci składni Nazwiska


        if (ctype_alpha($nazwisko) == false) {
            $wszystko_OK = false;
            $NiePrDaNa = 'Nazwisko może składać się tylko z lier !<br><br>';
        }
    }


    //Sprawdzanie zmiennej Email
    $email = $_POST['Email'];
    //$emailB = filter_var($Email, FILTER_SANITIZE_EMAIL); //sanityzacja email


//    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
//        $wszystko_OK = false;
//        $NieEma = "Podaj poprawny adres e-mail!";
//    }

    //Sprawdzanie zmiennej Login
    $Login = $_POST['login'];
    
    if($Login ==''){
        $BrLogi = 'Pole konieczne';
    }
    
    
    
    
    
    //Sprawdź poprawność hasła
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];

    if ($haslo == '') {
        $wszystko_OK = false;
        $BrHas = 'Pole konieczne';
    } 
//    else {
//
//        if ((strlen($haslo) < 8) || (strlen($haslo) > 20)) {
//            $wszystko_OK = false;
//            $NiePrDlHa = "Hasło musi posiadać od 8 do 20 znaków!";
//        }
//    }
//    if ($haslo == '') {
//        $wszystko_OK = false;
//        $BrHas = 'Pole konieczne';
//    } else {
//        if ($haslo != $haslo2) {
//            $wszystko_OK = false;
//            $NieIdHa = "Podane hasła nie są identyczne!";
//        }
//    }



    // $Emaili = $pdo->prepare("SELECT * FROM mydb.Produkt");
    $EmailI = $pdo->prepare("SELECT idUzytkownik FROM mydb.Uzytkownik WHERE Email='$email'");
    $EmailI ->execute();
    $ileE =0;
    
    foreach ($EmailI as $row) {
            $ileE++;

    }
  
    if ($ileE > 0) {
        $wszystko_OK = false;
        $EmailIst = "Istnieje już konto przypisane do tego adresu e-mail!";
    }
    
    //Czy login jest już zarezerwowany?
    $rezultat = $pdo->prepare("SELECT idUzytkownik FROM mydb.Uzytkownik WHERE Login='$Login'");
    $rezultat -> execute();
    $ile = 0;
    
    foreach ($rezultat as $row) {
            $ile++;

    }
    if ($ile > 0) {
        $wszystko_OK = false;
        $LoginIst = "Istnieje już klient o takim loginie! Wybierz inny.";
    }
    if ($wszystko_OK == true) {
       // Dodawanie zmiennych do bazy danych do tabeli Adres 
        $liczba = $pdo->exec("INSERT INTO Adres (Kraj, Miasto, Ulica, Numer, KodPocztowy)VALUES('$kraj', '$miasto','$ulica','$numerDomu','$kodPocztowy' )");

        

        if ($liczba > 0) {
            echo 'Dodano: ' . $liczba . ' rekordow';
        } else {
            echo 'Wystąpił błąd podczas dodawania rekordów!';
        }

$haslo =  sha1($haslo);
        $db = $pdo->prepare("SELECT idAdres FROM mydb.Adres ORDER BY idAdres DESC LIMIT 1");
        $db->execute();

        $idAd = $db->fetchColumn(0);



//    Dodawanie zmiennych do bazy danych do tabeli Uzytkownik

        $liczba1 = $pdo->exec("INSERT INTO Uzytkownik (Imie, Nazwisko, Login, Haslo, Email, Role_idRole, Adres_idAdres)VALUES('$imie', '$nazwisko','$Login','$haslo','$Email', 1, '$idAd')");


mysql_close ($db);
     
    }

}
//		
//		//Czy zaakceptowano regulamin?
//		if (!isset($_POST['regulamin']))
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
//		}
//		
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
                            <a href="rejestracja.php">Rejestracja</a>
                        </li>
                        <li>
                            <a href="logowanie.php">Logowanie</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>

        <div class="container">

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="formularz">
                <div class="col-md-8">

                    <label >Imie</label > <br /> <input type="text" class="form-control" value="" name="Imie" id="Imie" /><br />

<?php
if (isset($BrImienia)) {
    echo $BrImienia;
}

if (isset($NiDlImienia)) {
    echo $NiDlImienia;
}

if (isset($NiePrDan)) {
    echo $NiePrDan;
}
?>


                    <label >Nazwisko:</label > <br> <input type="text" class="form-control" value="" name="Nazwisko" /><br>
                    <br>

                    <?php
                    if (isset($BrNazwiska)) {
                        echo $BrNazwiska;
                    }

                    if (isset($NiePrDlNa)) {
                        echo $NiePrDlNa;
                    }

                    if (isset($NiePrDanNa)) {
                        echo $NiePrDanNa;
                    }
                    ?>

                    <label >E-mail:</label > <br> <input type="text" class="form-control" value="" name="Email" /><br>

                    <?php
                    if (isset($NieEma)) {
                        echo $NieEma;
                    }

                    if (isset($EmailIst)) {
                        echo $EmailIst;
                    }
                    ?>


                    <br>
                    <br>
<!--                    <fieldset>
                        <legend>Adres:</legend>-->
                        <br>

                        <label >Kraj:</label > <br> <input type="text" class="form-control" value="" name="Kraj" />

                        <label >Miasto:</label > <br> <input type="text" class="form-control" value="" name="Miasto" />
                        <label >Ulica:</label > <br> <input type="text" class="form-control" value="" name="Ulica" />
                        <label >Numer Domu:</label > <br> <input type="text" class="form-control" value="" name="NumerDomu" />
                        <label >Kod Pocztowy</label > <br> <input type="text" class="form-control" value="" name="KodPocztowy" />
                        <br>
                        <br>
                  
                    <!--                    Login-->

                    <label >Login:</label > <br> <input type="text" class="form-control" value="" name="login" /><br />


                    <?php
                    if (isset($BrLogi)) {
                        echo  $BrLogi;
                    }
                    
                    if(isset ($LoginIst)){
                        echo $LoginIst;
                    }
                    ?>

                  <!--                        Hasło-->
                    <label >Twoje hasło:</label > <br> <input type="password" class="form-control" value="" name="haslo" /><br />

                     <?php
                    if (isset($BrHas)) {
                        echo  $BrHas;
                    }
                    ?>

                    
                    
                    
                    <label >Powtórz hasło:</label > <br> <input type="password" class="form-control" value="" name="haslo2" /><br />
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox">
                            <span class="glyphicon glyphicon-ok"></span>
                            Akceptuje regulamin
                        </label>


                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default">Zarejstruj!</button>
                    </div>
                </div>
            </form>
        </div>

        <br>
        <br>
    </body>

</html>
