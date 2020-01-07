<?php

class Benutzer
{
    public $id;
    public $name;
    public $passwort;

    public function retrieveBenutzer($username, $conn)
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

    public function toString()
    {
        print($this->name . "," . $this->id . "," . $this->passwort);
    }
}

