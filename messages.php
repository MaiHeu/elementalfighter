<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<?php


include("DatabaseHandler.php");


if (isset($_GET['text'])) {

    $message = $_POST['message'] . "<br><i>Gesendet von: " . $_COOKIE['NAME'] . "</i>";
    $receiver = $_POST['receiver'];
    $subject = $_POST['subject'];

    session_start();
    $sql = connectToDatabase();

    try {
        $sth = $sql->prepare(" INSERT INTO `Message` ( `SenderNr`, `EmpfängerNr`, `Betreff`, `Nachricht`)
    VALUES(
    $_COOKIE[ID], 
    (SELECT `BenutzerID`
    FROM `Benutzer`
    WHERE `Benutzer`.`Name` = '$receiver'),
    '$subject',
    '$message') ");

        if ($sth->execute() == FALSE) {
            echo "Nachricht konnte nicht gesendet werden.";
        } else {
            ?>
            <script> document.getElementById("texterForm").reset(); </script>
            <?php
        }
    } catch (Exception $e) {
    }


    session_destroy();

}

?>

<table style="width: 80%">
    <th>

        <?php
        // CHECK FOR MESSAGES AND DISPLAY THEM

        session_start();
        $sql = connectToDatabase();


        $sth = $sql->prepare("SELECT * FROM message m WHERE m.EmpfängerNr = $_COOKIE[ID]");
        $sth->execute();

        if (($result = $sth->fetchAll()) == FALSE) {
            ?>
            <div class="messageAct-form">
                <form action="?text=1" method="post">
                    <h2 class="text-center"> Keine neuen Nachrichten </h2>
                </form>
            </div>
            <?php
        } else {

            foreach ($result as $messageData) {

                ?>
                <div class="messageAct-form">
                    <form action="?text=1" method="post">
                        <h2 class="text-center">  <?php echo $messageData[4]; ?> </h2>
                        <br>
                        <?php echo $messageData[5]; ?> <br>
                        <i>Empfangen am: <?php echo $messageData[3]; ?> </i>
                    </form>
                </div>
                <?php
            }
        }

        session_destroy();
        // CHECKED FOR MESSAGES AND DISPLAYED THEM
        ?>

    </th>
    <th>

        <div class="message-form" id="texterForm">
            <form action="?text=1" method="post">
                <h2 class="text-center">Nachricht abschicken</h2>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nutzername" name="receiver"
                           required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Betreff" name="subject" required="required">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Nachricht" rows="5" name="message"
                              required="required"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Abschicken</button>
                </div>
            </form>
        </div>

    </th>
</table>