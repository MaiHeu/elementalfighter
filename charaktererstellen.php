<?php
include("DatabaseHandler.php");
if (isset($_GET['create'])) {
    $givenData = array($_COOKIE['ID'], $_POST['charaktername'], $_POST['bild'], $_POST['geschlecht']);
    $con = connectToDatabase();

    //Charakter erstellen
    $statement = $con->prepare("INSERT INTO `Charakter` (`BenutzerNR`, `Name`, `Bildlink`, `Geschlecht`) VALUES(?, ?, ?, ?);");
    $statement->execute($givenData);

    //Anzahl der Werte in der Tabelle feststellen feststellen
    $statement = $con ->prepare("SELECT COUNT(*) FROM `Wertnamen`");
    $statement->execute(null);
    $anzahlWerte = $statement->fetch();

    //CharakterID feststellen
    $statement = $con ->prepare("SELECT CharakterID FROM `Charakter` WHERE BenutzerNR = ?");
    $statement->execute(array($_COOKIE["ID"]));
    $CharakterID = $statement->fetch();

    $statement = $con->prepare("INSERT INTO `ZO_CharakterWerte` (`CharakterNR`, `WertnamenNR`, `Wert`) VALUES(?, ?, (SELECT w.Startwert FROM `Wertnamen` w  WHERE WertnamenID = ?))");
    $j = 1;
    for($i = 0; $i < $anzahlWerte[0]; $i++) {
        $statement->execute(array($CharakterID[0], $j, $j));
        $j++;
    }
    $con = 0;
    echo "<p>Erstellung erfolgreich. <a href='index.php'>Klicke hier um zur Hauptseite zurückzukehren.</a></p>";
} else {
    ?>
    <form action="?create=1" method="post">
        <h2 class="text-center">Erstellung</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Charaktername" name="charaktername" required="required">
        </div>
        <div class="form-group">
            <input type="radio" name="geschlecht" value="m" required="required">männlich
            <input type="radio" name="geschlecht" value="w" required="required">Weiblich
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Bildlink" name="bild">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Erstellen</button>
        </div>

    </form>
<?php
} //ENDE ISSET VOM ANFANG
?>