<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<?php

include("DatabaseHandler.php");

if (isset($_GET['register'])) {
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 == $password2) {

        $password1 = password_hash($password1, PASSWORD_DEFAULT);
        session_start();
        $sql = connectToDatabase();

        $sql_statement = "INSERT INTO Benutzer(`name`, `e-mail`, `passwort`) 
            VALUES ('" . $username . "','" . $mail . "','" . $password1 . "');";

        if ($sql->query($sql_statement) == FALSE) {
            echo "ERROR COMPLICATED_DATABASE_CONNECTION_ERROR";
        } else {

            ?>

            <div class="login-form">
                <form action="login.php">
                    <h2 class="text-center">Registrierung abgeschlossen!</h2>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Weiter</button>
                    </div>

                </form>
            </div>

            <?php

        }
    } else {
        "<h2>Passwords not equal!</h2>";
    }
} else {
    ?>


    <div class="login-form">
        <form action="?register=1" method="post">
            <h2 class="text-center">Registrierung</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nutzername" name="username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Passwort" name="password1" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Passwort wiederholen" name="password2"
                       required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="E-Mail" name="mail" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Registrieren</button>
            </div>

        </form>
        <p class="text-center"><a href="login.php">Account bereits vorhanden?</a></p>
    </div>


    <?php
}  //ENDE DER IF ISSET VOM ANFANG
?>