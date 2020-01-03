<?php

class Benutzer
{
    public $id;
    public $name;
    public $passwort;

    public function retrieveBenutzer($username, $conn)
    {
        print("In der funktion retrieve Benutzer");
        $statement = $conn->prepare("SELECT `BenutzerID`, `Name`, `Passwort` FROM Benutzer WHERE Name = ?");
        $statement->execute([$username]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "Benutzer", []);
        $result = $statement->fetch();
        print_r($result);
        return $statement->fetch();
    }

    public function toString()
    {
        print($this->name . "," . $this->id . "," . $this->passwort);
    }
}

