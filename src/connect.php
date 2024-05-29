<?php

const DBHOST = "db";
const DBNAME = "atelier_Stage";
const DBUSER = "test";
const DBPASS = "test";

$dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

try {
    // Ici, on essaye de se connecter //
    $db = new PDO($dsn, DBUSER, DBPASS);
    // echo "Connexion réussi" . "<br>";
} catch(PDOException $error) {
    echo "éhec de la connexion: " . $error->getMessage() . "<br>";
}

?>