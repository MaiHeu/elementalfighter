<?php
    include ("DatabaseHandler.php");

    $con = connectToDatabase();
    $statement = $con->prepare("SELECT `Name`, `Bildlink`,`Geschlecht` FROM Charakter WHERE BenutzerNR = ?;");
    $statement->execute([$_COOKIE["ID"]]);
    $result = $statement -> fetch();

    echo "<h1>Hallo $result[0]</h1>";
    echo "<img src=$result[1]>";
    echo "<p>Geschlecht: ";
    if($result[2] == "w"){
        echo "weiblich</p>";
    }
    else {
        echo "männlich</p>";
    }

?>