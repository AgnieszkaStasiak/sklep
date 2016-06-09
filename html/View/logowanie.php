


<?php
// Nawiązanie polaczenia z bazą danych.
//        require '../../connection.php';
//        connecti();
session_start();


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


    $login = trim($_POST['login']);
    $login = htmlentities($login,ENT_QUOTES,"UTF-8");
    $password = trim($_POST['haslo']);
    $password = htmlentities($password,ENT_QUOTES,"UTF-8");
    $wszystko_OK = true;
//Kodowanie hasła.
    $password = sha1($password);


$loginSp = $pdo->prepare("SELECT * FROM Uzytkownik WHERE Login=:login");

$loginSp->bindValue(":login", $login, PDO::PARAM_STR);
$loginSp->execute();

$loginSprow = $loginSp->fetch(PDO::FETCH_ASSOC);

if($loginSp->rowCount() == 0){
    $wszystko_OK=false;
    $NiePrLo="Nieprawidłowy Login";
} else{
  
//Wydobyc hasło dla danego logina jeżeli wprowadzone hasło jest równe temu które zostało wydobyte dla danego loginu przechodzi dalej jeśli nei to wypisuje błąd o nieprawidłowym haśle
$stmt = $pdo->prepare("SELECT * FROM Uzytkownik WHERE Login=:login AND Haslo=:password");

$stmt->bindValue(":login", $login, PDO::PARAM_STR);
$stmt->bindValue(":password", $password, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($stmt->rowCount() != 0) {
            $rola = $pdo->prepare("SELECT Role_idRole FROM Uzytkownik WHERE Login=:login AND Haslo=:password");
            $rola->bindValue(":login", $login, PDO::PARAM_STR);
            $rola->bindValue(":password", $password, PDO::PARAM_STR);

            $rola->execute();
            $role = $rola->fetchColumn(0);

            var_dump($role);
            if ($role == 2) {
                header('Location:index_admin.php');
                $_SESSION['ZalogowanyAdmin']=True;
             $_SESSION['idUA'] = $row['idUzytkownik'];
//        $wiersz= $stm->fetch_assoc();
//        $rezult = $wiersz['Nazwisko'];
//        echo $rezult;
        
            }else{
             header('Location:../../index.php');
              $_SESSION['Zalogowany']=True;
            echo "Zalogowałeś się!";
            /*
             * Tworzymy sesję dla zalogowanego użytkownika z:
             * - informacją, że użytkownik jest zalogowany
             * - jego id
             */
  
           
           
            }
            
        } else {
            $blad = '<span style="color:red"> Nie prawidłowe hasło </span>';
           
        }    
        
        }
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
<!--        <script src="../Content/js/bootstrap.js" type="text/javascript"></script>
        <script src="../Content/js/bootstrap.min.js" type="text/javascript"></script>-->
        <link href="../Content/js/bootstrap.js" type="text/javascript">

    </head>

    <body>


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">"Sklep"</a>
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

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="col-md-8">



                    Login:
                    <input type="text" class="form-control" value="" name="login" />
                    <?php
                    if(isset($NiePrLo)){
                        echo $NiePrLo;
                        
                    }
                    
                    ?>
                    
                    
                    
                    Hasło
                    <input type="password" class="form-control" value="" name="haslo" />
<?php
                    if(isset($blad)){
                        echo $blad;
                        
                    }
                    
                    ?>

                    <br />
                    <button type="submit" class="btn btn-default">Zaloguj!</button>
                </div>
            </form>





        </div>



    </body>

</html>