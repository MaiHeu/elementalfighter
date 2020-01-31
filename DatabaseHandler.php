<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 10.12.2019
 * Time: 09:58
 */

//Konstanten für die Datenbank Verbindung
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "elementalfighter");

function connectToDatabase()
{
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";charset=utf8". ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}