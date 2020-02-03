<?php
include ("DatabaseHandler.php");
/* NUR ZUM DEBUG! Führt das Datenbankupdate aus, welches ansonsten das Event übernimmt. */

$statement = $con->prepare("UPDATE ZO_CharakterWerte zo
JOIN charakter c on zo.charakternr = c.charakterid
JOIN wertnamen w on zo.wertnamennr = w.wertnamenid
SET zo.Wert = zo.Wert + w.`tägl. training`
WHERE c.`Eingetr. Training` = `WertnamenNR` AND
c.CharakterID = `CharakterNR` AND
c.`Tage Training` IS NOT NULL");
$statement->execute();

$statement = $con->prepare("UPDATE charakter
  SET `Tage Training` =
    CASE
      WHEN `Tage Training`-1 = '0' THEN null
      ELSE `Tage Training`-1
    END,
  `Eingetr. Training` =
    CASE
      WHEN `Tage Training` = '0' THEN null
      ELSE `Eingetr. Training`
    END
WHERE 1");
$statement->execute();

echo "Update durchgeführt!";
/*

UPDATE ZO_CharakterWerte zo
JOIN charakter c on zo.charakternr = c.charakterid
JOIN wertnamen w on zo.wertnamennr = w.wertnamenid
SET zo.Wert = zo.Wert + w.`tägl. training`
WHERE c.`Eingetr. Training` = `WertnamenNR` AND
c.CharakterID = `CharakterNR` AND
c.`Tage Training` IS NOT NULL;

UPDATE charakter
  SET `Tage Training` =
    CASE
      WHEN `Tage Training`-1 = '0' THEN null
      ELSE `Tage Training`-1
    END,
  `Eingetr. Training` =
    CASE
      WHEN `Tage Training` = '0' THEN null
      ELSE `Eingetr. Training`
    END
WHERE 1
 *
 * zo.Wert += wertnamen.tägl. training
 *      JOIN charakter on zo.charakternr = charakter.charakterid
 *      JOIN wertnamen on zo.wertnamennr = wertnamen.wertnamenid
 * wo
 *      charakter.eingetr Training = zo.
 *
 * UPDATE user:
 * Tage Training - 1
 * Wenn Tage Training = 0
 *      user. Tage Training = Null
 *      user.eingetr. training = null
 * */



?>
