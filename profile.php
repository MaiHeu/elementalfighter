<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<?php


include("DatabaseHandler.php");
function retrieveBenutzer($username, $conn)
{
    //print("In der funktion retrieve Benutzer <br />");
    $statement = $conn->prepare("SELECT `BenutzerID`, `Name`, `Passwort` FROM Benutzer WHERE Name = ?");
    $statement->setFetchMode(PDO::FETCH_CLASS, "Benutzer", []);
    $statement->execute([$username]);
    $result = $statement->fetch();
    //print_r($result);
    //printf("<br />");
    return $result;
}

if (isset($_GET['save'])) {

} else {
    ?>


    <div class="login-form">
        <form action="?login=1" method="post">
            <h2 class="text-center">Profil bearbeiten</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nutzername" name="username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Passwort" name="password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Speichern</button>
            </div>

        </form>
    </div>

    <?php
}  //ENDE DER IF ISSET VOM ANFANG
?>
