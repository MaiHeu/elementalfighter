<h1>Charaktererstellung</h1>

<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 21.01.2020
 * Time: 09:50
 */

?>

<form action="?create=1" method="post">
    Name:
    <input type="charaktername" size="40" maxlength="250" name="username"><br><br>
    <br>

    Geburtsdatum:
    <!-- <input type="Geburtsdatum" size="40" maxlength="250" name="gebdat"><br> -->
    <br>

    Geschlecht:
    <select name="geschlecht">
        <option value="männlich">männlich</option>
        <option value="weiblich">weiblich</option>
    </select>
    <br><br>
    <br>

    Bild:
    <input type="text" size="40" maxlength="250" name="bildlink"><br><br>
    <br>

    <input type="submit" value="Abschicken">
    <br>
</form>
