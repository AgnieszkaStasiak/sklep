
<?php
//// Nawiązanie polaczenia z bazą danych.
////        require '../../connection.php';
////        connecti();
//$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'zaq11qaz');
//
//try {
//    $pdo->query('SET NAMES utf8');
//    $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    //echo 'Połączenie nawiązane!';
//} catch (PDOException $e) {
//    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
//}
//
//
//$login = trim($_POST['login']);
//$password = trim($_POST['haslo']);
//
//
////Kodowanie hasła.
//$password = sha1($password);
//
//
////Sprawdzenie czy użytkownik o podanych danych istnieje
//$stmt = $pdo->prepare("SELECT * FROM Uzytkownik WHERE Login=:login AND Haslo=:password");
//
//$stmt->bindValue(":login", $login, PDO::PARAM_STR);
//$stmt->bindValue(":password", $password, PDO::PARAM_STR);
//$stmt->execute();
//
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//
//$rola = $pdo->prepare("SELECT Role_idRole FROM Uzytkownik WHERE Login=:login AND Haslo=:password");
//$rola->bindValue(":login", $login, PDO::PARAM_STR);
//$rola->bindValue(":password", $password, PDO::PARAM_STR);
//
//$rola->execute();
//$role = $rola->fetchColumn(0);
//
//
//
//       echo'Admin';
//
//       // echo $wiersz['Nazwisko'];
//        
//
//
//    $_SESSION['logged'] = true;
//    $_SESSION['user_id'] = $row['idUzytkownik'];
//    $pdo->closeCursor();
//

?>