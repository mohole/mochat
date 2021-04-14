<?php 

header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: POST' );
header( 'Access-Control-Allow-Headers: *' );
header( 'Content-type: application/json' );

//raccolgo i dati della form di login (in login.js, const data contiene i dati)
$content = file_get_contents("php://input");
$decoded = json_decode($content, true); // contiene username e pw all'interno di un array associativo 
//parto da una risposta con errore
$response = (object)[
    'logged' => false,
    'userID' => null
];

//mi connetto al db
require_once('connection.php');

//controllo username e pw
$query_string= "SELECT ID FROM phpchat.users WHERE username = ? AND code = ?";
$stmt = $conn->prepare($query_string); 
$vars=array($decoded['user'], hash('sha256', $decoded['pswd']));

$stmt->execute($vars);

while($res = $stmt->fetch(PDO::FETCH_ASSOC)){ //se trovi dei dati
    $response = (object)[
        'logged' => true,
        'userID' => $res['ID']
    ];
}

//se ok, cambio la risposta in una corretta

echo json_encode( $response );