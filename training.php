
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
</head>

<?php
include("DatabaseHandler.php");
$con = connectToDatabase();
/*
 * Wenn btn_training ausgewählt wurde, dann:
 * - Hole welchen Wert der User momentan hat -> $wertDesUsers[0]
 * - Hole wie viel am Tag trainiert wird -> $taeglTraining
 * - Berechne Trainingstage Endwert = Endwert - WertdesCharakters / Tägl. Training
 * - schreibe WertenamenId in  charakter.Eingetr. Training
 * - schreibe Trainingstage in charakter.Tage Training
 *
 * Ansonsten:
 * - scheibe WertenamenID in charakter.Eingetr. Training
 * - schreibe Trainingstage von auswahlTrainingstage.$ausgewähltesTraining in charakter.Tage Training
 * */
if (isset($_GET['train'])){
    //finden der WertnamenID und wie viel Täglich Trainiert wird
    $statement = $con->prepare("SELECT `WertnamenID`, `Tägl. Training` FROM `Wertnamen` WHERE `Name` = ?");
    $statement->execute(array($_POST['btn_training']));
    $temp = $statement->fetch(); //zur lesbarkeit wird das nun aufgessplittet weil ich Honig im Kopf hab

    $taeglTraining = $temp[1];
    $wertnamenID = $temp[0];
    $temp = null;

    if (isset($_POST['ckbTraining'])) {
        //Finden des aktuellen Werts des Charakters
        $statement = $con->prepare("SELECT `Wert` FROM `ZO_CharakterWerte` WHERE `CharakterNR` = (SELECT `CharakterID` FROM Charakter WHERE BenutzerNR =?) AND `WertnamenNR` = ?");
        $statement->execute(array($_COOKIE['ID'], $wertnamenID));
        $wertDesUsers = $statement->fetch();

        //Stringbuilding um auf die Textbox zugreifen zu können
        $string = "txtTraining" . $_POST['btn_training'];
        $tageTraining = 0;

        //Handling falls der User Buchstaben oder anderen Quatsch eingibt.
        if (ctype_digit($_POST[$string])) {
            $tageTraining = ($_POST[$string] - $wertDesUsers[0]) / $taeglTraining;
            if ($tageTraining <= 0) {
                $tageTraining = 1;
            }
        } else {
            $tageTraining = 1;
        }


        $statement = $con->prepare("UPDATE `Charakter` SET `Eingetr. Training` = ?, `Tage Training` = ? WHERE `BenutzerNR` = ?");
        $statement->execute(array($wertnamenID, $tageTraining, $_COOKIE['ID']));
        ?>
        <script> parent.location.replace("index.php"); </script>
        <?php
    } else {
        $string = "auswahlTrainingstage" . $_POST['btn_training'];
        $tageTraining = $_POST[$string];
        $statement = $con->prepare("UPDATE `Charakter` SET `Eingetr. Training` = ?, `Tage Training` = ? WHERE `BenutzerNR` = ?");
        $statement->execute(array($wertnamenID, $tageTraining, $_COOKIE['ID']));
        ?>
        <script> parent.location.replace("index.php"); </script>
        <?php
    }


} else {
$statement = $con->prepare("SELECT COUNT(*) FROM `Wertnamen`");
$statement->execute(null);
$anzahlWerte = $statement->fetch();

$wertname = $con->prepare("SELECT `Name`, `Tägl. Training` FROM `Wertnamen`");
$wertname->execute();
?>

<div class="messageAct-form">
<form action="?train=1" method="post">

<table>
    <tr>
        <th>Training</th>
        <th>Wirkung</th>
        <th>Trainieren</th>
    </tr>
    <?php foreach ($wertname

    as $wert) { ?>
    <form method="post">
        <tr>
            <td>
                <?php print_r($wert[0]); ?>
            </td>
            <td>
                <?php print_r($wert[1] . " pro Tag"); ?>
            </td>
            <td>

                <select class="training" name="<?php print_r("auswahlTrainingstage" . $wert[0]) ?>"></select> Tag(e)
                <button type="submit" value="<?php print_r($wert[0]); ?>" name="btn_training">Abschicken</button>
                <br> Oder bis Wert <input type="text" size=5 name="<?php print_r("txtTraining" . $wert[0]) ?>"
                                          value="10"><input type="checkbox"
                                                            name="ckbTraining">
            </td>
        </tr>
        <?php } ?>
    </form>
    </form>
</table>

<script language="JavaScript">
    //An dieser Stelle möchte ich betonen, wie sehr ich JavaScript hasse. -Maik, 31.01.2020
    let select = document.getElementsByClassName("training");
    for (let j = 0; j < select.length; j++) {
        for (let i = 1; i <= 30; i++) {
            let el = document.createElement("option");
            el.textContent = i.toString();
            el.value = i.toString();
            select[j].appendChild(el);
        }
    }
</script>

</div>

<?php
}