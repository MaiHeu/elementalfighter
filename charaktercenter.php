<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

<?php
include("DatabaseHandler.php");

session_start();
$sql = connectToDatabase();

$sth = $sql->prepare("SELECT COUNT(1)
FROM charakter
WHERE BenutzerNR = $_COOKIE[ID]");
$sth->execute();

if (($result = $sth->fetchAll()) == FALSE) {
    
}
else if($result[0][0] == 0)
{
    ?>
    <script> window.open("charaktererstellen.php","_self"); </script>
    <?php
}


?>

<div class="login-form">
    <form method="post" action="charakterloeschen.php">

<?php

$con = connectToDatabase();
$statement = $con->prepare("SELECT `Name`, `Bildlink`,`Geschlecht` FROM Charakter WHERE BenutzerNR = ?;");
$statement->execute([$_COOKIE["ID"]]);
$result = $statement->fetch();

echo "<h1>Hallo $result[0]</h1>";
echo "<img src=$result[1] height=auto width=256px>";
echo "<p>Geschlecht: ";
if ($result[2] == "w") {
    echo "weiblich</p>";
} else {
    echo "männlich</p>";
}

$statement = $con->prepare("SELECT w.`Name`, z.`Wert` 
FROM `Wertnamen` w JOIN `ZO_CharakterWerte` z ON w.WertnamenID = z.WertnamenNR 
WHERE z.`CharakterNR` = 
    (SELECT `CharakterID` FROM `Charakter` WHERE `BenutzerNR` = ?)");
$statement->execute(array($_COOKIE["ID"]));
$result = $statement->fetchAll();

?>

<div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Charakter löschen</button>
        </div>
    </form>
</div>

<center>
<div class="container">
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fähigkeit</th>
                        <th>Wert</th>
                    </tr>
                </thead>
                <tbody>
<?php

foreach ($result as $statData) 
{
    //echo $statData[0] . ": ";
    //echo $statData[1] . "<br>";

    ?>

    <tr>
        <td> <?php echo $statData[0]; ?> </td>
        <td> <?php echo $statData[1]; ?> </td>
    </tr>

    <?php
}

?>
                </tbody>
            </table>
        </div>
    </div>     

</center>

