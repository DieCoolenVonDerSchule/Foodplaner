<?php
include_once ('header_login.php');

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=foodplaner', 'root', '');

if(isset($_GET['login'])) {
    $user_username = $_POST['user_username'];
    $user_passwort = $_POST['user_password'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE user_username = :user_username");
    $result = $statement->execute(array('user_username' => $user_username));
    $user = $statement->fetch();

    var_dump($user);

    //Überprüfung des Passworts
    if ($user !== false && $user['user_password'] == $user_passwort) {
        $_SESSION['user_id'] = $user['user_id'];

        header('location: index.php');
        exit;

    } else {
        $errorMessage = "Nutzername oder Passwort war ungültig<br>";
    }

}
?>




<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action="?login=1" method="post">
Benutzername:<br>
<input type="username" size="40" maxlength="250" name="user_username"><br><br>

Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="user_password"><br>

<input type="submit" value="Abschicken">
</form>


<?php
include_once ('footer.php');
?>
