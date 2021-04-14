<?php 

header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST' );
header( 'Access-Control-Allow-Headers: *' );
header( 'Content-type: application/json' );

//raccolgo i dati del campo di invio messaggi
$content = file_get_contents("php://input");
$decoded = json_decode($content, true);

//LAVORIAMO SUL FORMATO DEL TIMESTAMP
date_default_timezone_set("Europe/Rome"); //impostiamo il fuso orario giusto
$DBdate = date( "Y-m-d H:i:s", strtotime( $decoded['timestamp'] )); 
//strtotime prende una stringa e trasforma in un time, ovvero un numero (di millisecondi o simili). 
//date prende il numero ottenuto e lo trasforma nel formato passato come primo parametro.
//formato (come quello nel db): anno per intero, mese, giorno - ore, minuti, secondi


//mi connetto al db
require_once('connection.php');

//controllo username e pw
$query_string= "INSERT INTO phpchat.messages (ID, user_id, message, created_at) VALUES (NULL, ?, ?, ?)";
$stmt = $conn->prepare($query_string); 
$vars=array($decoded['owner'], $decoded['text'], $DBdate);
$stmt->execute($vars);

//in message non è richiesta una response, a differenza del login. Però ne mettiamo lo stesso una
$response = (object)[
    'id' => $conn->lastInsertId(), //chiede l'id dell'ultimo oggetto inserito nel db
    'message' => $decoded['text']
];
echo json_encode( $response );