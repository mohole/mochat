<?php 

header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST' );
header( 'Access-Control-Allow-Headers: *' );
header( 'Content-type: application/json' );

//mi connetto al db
require_once('connection.php');

//controllo username e pw
$query_string= "SELECT messages.ID, message, created_at, user_id, username FROM phpchat.messages INNER JOIN phpchat.users ON messages.user_id = users.ID LIMIT 100"; //fermati quando hai estratto 100 messaggi
$stmt = $conn->prepare($query_string); 
$stmt->execute();

$response = array();

while($res = $stmt->fetch(PDO::FETCH_ASSOC)){ //se trovi dei dati
    $response[] = (object)[ //$response[] dice a php di aggiungere i dati nell'array response alla prima posizione disponibile (a ogni giro aggiunge i nuovi dati nell'ultima pos dell'array)
        'id' => $res['ID'],
        'text' => $res['message'],
        'timestamp' => $res['created_at'],
        'owner' => (int)$res['user_id'], //operazione di casting: forziamo l'assegnazione del tipo di dato desiderato alla nostra variabile
        'username' => $res['username']
    ];
}

echo json_encode( $response );