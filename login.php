<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="style.css">

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
        
            $benutzer = retrieveBenutzer($_POST["username"], $sql);

            if(password_verify($password, $benutzer[2]))
            {
                setcookie("ID", "$benutzer[0]", null, '/');
                setcookie("Name", "$benutzer[2]", null, '/');
                ?>
                
<div class="login-form">
    <form action="index.php">
        <h2 class="text-center">Willkommen zurück!</h2>       
        <div class="form-group">
            <button class="btn btn-primary btn-block">Weiter</button>
        </div>

    </form>
</div>

                <?php
            }

        }
} else {
?>


<div class="login-form">
    <form action="?login=1" method="post">
        <h2 class="text-center">Anmeldung</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nutzername" name="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Passwort" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Anmelden</button>
        </div>

    </form>
    <p class="text-center"><a href="register.php">Neuen Account erstellen</a></p>
</div>                       		                            

<?php
}  //ENDE DER IF ISSET VOM ANFANG
?>
