<?php
include("DatabaseHandler.php");
$conn = connectToDatabase();

function retrieveBenutzer($username, $conn)
{
    $statement = $conn->prepare("SELECT * FROM Benutzer WHERE Name = ?");
    $statement->execute([$username]);
    $statement->setFetchMode(PDO::FETCH_CLASS, "Benutzer", []);
    return $statement->fetch();
}

?>

<!DOCTYPE html>
<html>
    <body>
        <form action="login.php" method="POST">
            <p>Benutzername:<input type="text" name="benutzername">
            Passwort: <input type="password" name="passwort">
                <button type="submit" name="login">Login</button></p>
        </form>
    </body>
</html>