<?php
include("DatabaseHandler.php");
include("classes\Benutzer.php");
$conn = connectToDatabase();
$benutzer = new Benutzer();

if(isset($_GET['login'])){
    $benutzer = $benutzer->retrieveBenutzer($_POST["inputBenutzername"], $conn);

    if(password_verify($_POST["inputPasswort"], $benutzer->passwort)) {
        setcookie("ID", "$benutzer->id", null, '/');
        setcookie("Name", "$benutzer->username", null, '/');
        print("Erfolgreich!");
    } else {
        print("Passwort falsch!");
        print($benutzer->toString());
    }
} else{ //anfang von else
?>

<form action="?login=1" method="POST">
    <p>Benutzername:<input type="text" name="inputBenutzername">
    Passwort: <input type="password" name="inputPasswort">
        <button type="submit" name="login">Login</button></p>
</form>

<?php
} //ende von else
?>