<h1>Register your account!</h1>
hot babes r absolutely waiting for u mah m8


<?php

include("DatabaseHandler.php");
function retrieveBenutzer($username, $conn)
{
    print("In der funktion retrieve Benutzer <br />");
    $statement = $conn->prepare("SELECT `BenutzerID`, `Name`, `Passwort` FROM Benutzer WHERE Name = ?");
    $statement->setFetchMode(PDO::FETCH_CLASS, "Benutzer", []);
    $statement->execute([$username]);
    $result = $statement->fetch();
    print_r($result);
    printf("<br />");
    return $result;
}

if (isset($_GET['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    session_start();
    $sql = connectToDatabase();
    $sql_statement = "SELECT Passwort FROM benutzer;";

    $sql_result = $sql->query($sql_statement);

    if ($sql->query($sql_statement) == FALSE) {
        echo "ERROR COMPLICATED_DATABASE_CONNECTION_ERROR";
    } else {

        print_r($sql_result);

        $benutzer = retrieveBenutzer($_POST["username"], $sql);

        if(password_verify($password, $benutzer[2]))
        {
            print_r("Du bist drin du Spaten");
            setcookie("ID", "$benutzer[0]", null, '/');
            setcookie("Name", "$benutzer[2]", null, '/');
        }

//            print_r($result);
        //          if(password_verify(password, ))

    }
} else {
    ?>

    <form action="?login=1" method="post">
        Benutzername:
        <input type="username" size="40" maxlength="250" name="username"><br><br>
        <br>

        Passwort:
        <input type="password" size="40" maxlength="250" name="password"><br>
        <br>

        <input type="submit" value="Einloggen">
        <br>
    </form>

<?php
}  //ENDE DER IF ISSET VOM ANFANG
?>