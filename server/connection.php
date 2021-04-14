<?php

$host = "localhost";
$username = "root";
$password = "root";
$db = "phpchat";

// prova ad eseguire del codice
try {
    $conn = new PDO("mysql:host=$host;dbname = $db;", $username, $password);

    //gestisci eventuali problemi con le eccezioni
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
// se c'è un problema dentro ad $e ci sarà un messaggio di errore
} catch ( PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); //l'ultima istruzione stampa il msg leagto all'errore specifico che è avvenuto
}
?>