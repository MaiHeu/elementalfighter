<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<?php
include("DatabaseHandler.php");
if (isset($_GET['loeschen'])) {
    $con = connectToDatabase();
    $statement = $con->prepare("SELECT `Passwort` FROM `Benutzer` WHERE BenutzerID = ?");
    $statement->execute([$_COOKIE['ID']]);
    $result = $statement->fetch();
    $password = $_POST['password'];

    if (password_verify($password, $result[0])) {
        $statement = $con->prepare("DELETE FROM `Charakter`  WHERE `BenutzerNR` = ?");
        $statement->execute([$_COOKIE['ID']]);
        $statement = $con->prepare("DELETE FROM `Benutzer` WHERE `BenutzerID` = ?;");
        $statement->execute([$_COOKIE['ID']]);

        echo "Benutzer gelöscht. <a href='index.php'> Good Bye.</a>";
        ?>
        <script> window.open("login.php", "_self"); </script>   <?php
    } else {
        echo "<center>Falsches Passwort. <br />";
        echo "<a href=main.php>Zurück zur Startseite</a></center>";
    }

} else {

    ?>

    <div class="login-form">
        <form action="?loeschen=1" method="post">
            <h2>Wirklich löschen?</h2>
            Das Löschen des Accounts kann nicht rückgängig gemacht werden!<br>
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