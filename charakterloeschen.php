<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
include ("DatabaseHandler.php");
if (isset($_GET['loeschen'])) {
    $con = connectToDatabase();
    $statement = $con->prepare("SELECT `Passwort` FROM `Benutzer` WHERE BenutzerID = ?");
    $statement->execute([$_COOKIE['ID']]);
    $result = $statement->fetch();
    $password = $_POST['password'];

    if(password_verify($password, $result[0])){
        $statement = $con ->prepare("DELETE FROM `Charakter` WHERE `BenutzerNR` = ?");
        $statement->execute([$_COOKIE['ID']]);
        echo "Charakter gelöscht. <a href=charaktererstellen.phpcharaktererstellen.php>Hier gehts zur Charaktererstellung</a>";
    } else {
        echo "Falsches Passwort. <br />";
        echo "<a href= charakterloeschen.php>Zurück</a>";
    }

} else{

?>
<div class="login-form">
    <form action="?loeschen=1" method="post">
        <h2>Wirklich löschen?</h2>
    Wenn du einen neuen Charakter erstellen möchtest, kannst du hier deinen Charakter löschen.<br>
    Das kann nicht rückgängig gemacht werden!<br>
    Gib zur Bestätigung dein Passwort ein.
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Löschen</button>
        </div>

    </form>
</div>

<?php
} //ENDE ELSE IFSET LOESCHEN