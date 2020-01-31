<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
</head>

<?php
    include("DatabaseHandler.php");

    $con = connectToDatabase();
    $wertnamen = $con->prepare("SELECT `Name`, `Tägl. Training` FROM `Wertnamen`");
    $wertnamen->execute();

    if(isset($_POST['train'])){

    } else {
?>
<table>
    <tr>
        <th>Training</th>
        <th>Wirkung</th>
        <th>Trainieren</th>
    </tr>
    <form action="?train=1" method="post">
        <?php foreach ($wertnamen as $wert) { ?>
            <tr>
                <td>
                    <?php    print_r($wert[0]); ?>
                </td>
                <td>
                    <?php    print_r($wert[1]." pro Tag"); ?>
                </td>
                <td>
                    <select name="auswahlTrainingstage"></select> Tag(e) <button type="submit" value="<?php    print_r($wert[0]); ?>" name ="btn_training">Abschicken</button>
                    <br> Oder bis Wert <input type="text" name="txtTraining" value="0"><input type ="checkbox" name="ckbTraining">
                </td>
            </tr>
        <?php } ?>
    </form>
</table>

<script language="JavaScript">
    //An dieser Stelle möchte ich betonen, wie sehr ich JavaScript hasse. -Maik, 31.01.2020
    let select = document.getElementsByName("auswahlTrainingstage");
    for(let j = 0; j < select.length; j++){
        for(let i = 1; i <=30; i++){
            let el = document.createElement("option");
            el.textContent = i.toString();
            el.value = i.toString();
            select[j].appendChild(el);
        }
    }
</script>
<?php
    print_r ($_POST);
}