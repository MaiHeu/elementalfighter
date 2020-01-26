<?php
include("DatabaseHandler.php");
if (isset($_GET['create'])) {
    $givenData = array($_COOKIE['ID'], $_POST['charaktername'], $_POST['bild'], $_POST['geschlecht']);
    $con = connectToDatabase();
    $statement = $con->prepare("INSERT INTO `Charakter` (`BenutzerNR`, `Name`, `Bildlink`, `Geschlecht`) VALUES(?, ?, ?, ?);");
    $statement->execute($givenData);
} else {
?>
    <form action="?create=1" method="post">
        <h2 class="text-center">Erstellung</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Charaktername" name="charaktername" required="required">
        </div>
        <!--        <div class="form-group">
                    <input type="text" class="form-control" placeholder="Geburtstag" name="geburtstag" required="required">
                </div> --!>
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