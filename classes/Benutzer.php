<?php

class Benutzer
{
    public $id;
    public $name;
    public $passwort;



    public function toString()
    {
        print($this->name . "," . $this->id . "," . $this->passwort);
    }
}

