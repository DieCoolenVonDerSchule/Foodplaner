<?php
include_once ('header_login.php');


session_start();
$pdo = new PDO('mysql:host=localhost;dbname=foodplaner', 'root', '');


$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(strlen($username) == 0) {
        echo 'Bitte einen gültigen Usernamen eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM USERS WHERE user_username = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Dieser Username ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $statement = $pdo->prepare("INSERT INTO users (user_id, user_forename, user_surname, user_username, user_password) VALUES (NULL, :forename, :surname, :username, :password);");
        $result = $statement->execute(array('forename' => $forename, 'surname' => $surname, 'username' => $username, 'password' => $passwort));

        if($result) {
            header('location: login.php');
            $showFormular = false;

        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
?>

<form action="?register=1" method="post">
Vorname:<br>
<input type="forename" size="40" maxlength="250" name="forename"><br><br>

Nachname:<br>
<input type="surname" size="40" maxlength="250" name="surname"><br><br>

Benutzername:<br>
<input type="username" size="40" maxlength="250" name="username"><br><br>

Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>

Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

<input type="submit" value="Abschicken">
</form>

<?php
} //Ende von if($showFormular)
?>

<?php
include_once ('footer.php');
?>
