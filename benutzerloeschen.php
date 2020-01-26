<?php
include ("DatabaseHandler.php");
if (isset($_GET['loeschen'])) {
    $con = connectToDatabase();
    $statement = $con->prepare("SELECT `Passwort` FROM `Benutzer` WHERE BenutzerID = ?");
    $statement->execute([$_COOKIE['ID']]);
    $result = $statement->fetch();
    $password = $_POST['password'];

    if(password_verify($password, $result[0])){
        $statement = $con ->prepare("DELETE FROM `Charakter`  WHERE `BenutzerNR` = ?");
        $statement->execute([$_COOKIE['ID']]);
        $statement = $con ->prepare("DELETE FROM `Benutzer` WHERE `BenutzerID` = ?;");
        $statement->execute([$_COOKIE['ID']]);

        echo "Benutzer gelöscht. <a href='index.php'> Good Bye.</a>";
    } else {
        echo "Falsches Passwort. <br />";
        echo "<a href= charakterloeschen.php>Zurück</a>";
    }

} else{
    echo "Hier kannst du deinen Account löschen.";
    echo "Das kann nicht rückgängig gemacht werden!";
    ?>
    <p>Gib zur Bestätigung dein Passwort nochmal ein:</p>
    <form action="?loeschen=1" method="post">
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Löschen</button>
        </div>

    </form>

    <?php
} //ENDE ELSE IFSET LOESCHEN