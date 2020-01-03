<h1>Register your account!</h1>
hot babes r waiting for u


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
            echo "<h2> Your Account has been created!</h2>";
        }
    }
    else
    {
        "<h2>Passwords not equal!</h2>";
    }
} else {
?>

    <form action="?register=1" method="post">
        Benutzername:
        <input type="username" size="40" maxlength="250" name="username"><br><br>
        <br>

        Passwort:
        <input type="password" size="40" maxlength="250" name="password1"><br>
        <br>

        Passwort wiederholen:
        <input type="password" size="40" maxlength="250" name="password2"><br><br>
        <br>

        E-Mail:
        <input type="mail" size="40" maxlength="250" name="mail"><br><br>
        <br>

        <input type="submit" value="Abschicken">
        <br>
    </form>

<?php
}  //ENDE DER IF ISSET VOM ANFANG
?>