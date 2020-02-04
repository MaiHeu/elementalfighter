CREATE DEFINER=`root`@`localhost`
    EVENT `TRAINING_UPDATE_CHARAKTER` ON SCHEDULE
        EVERY 1 DAY STARTS '2020-02-01 01:00:00' ENDS '2025-02-01 01:00:00'
    ON COMPLETION PRESERVE ENABLE DO UPDATE charakter
        SET `Tage Training` =
        CASE WHEN `Tage Training`-1 = '0' THEN null
            ELSE `Tage Training`-1
        END,
        `Eingetr. Training` =  CASE WHEN `Tage Training` = '0'
            THEN null
        ELSE `Eingetr. Training`
        END
    WHERE 1;

CREATE DEFINER=`root`@`localhost`
    EVENT `TRAINING_UPDATE_ZO_CHARAKTERWERTE` ON SCHEDULE
        EVERY 1 DAY STARTS '2020-02-01 00:00:00' ENDS '2025-02-02 00:00:00'
    ON COMPLETION PRESERVE ENABLE DO UPDATE ZO_CharakterWerte zo
    JOIN charakter c on zo.charakternr = c.charakterid
    JOIN wertnamen w on zo.wertnamennr = w.wertnamenid
    SET zo.Wert = zo.Wert + w.`tägl. training`
    WHERE c.`Eingetr. Training` = `WertnamenNR` AND
    c.CharakterID = `CharakterNR` AND
    c.`Tage Training` IS NOT NULL;