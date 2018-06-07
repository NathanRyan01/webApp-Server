<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

 
//include database connection file

require_once ("config.php");
 
//define database object
global $dbc;

$data = json_decode( file_get_contents("php://input"),true );
 
$message = "";
$id =  $data['id'];
$text =  $data['text'];

$stmt = $dbc->prepare("SELECT COUNT(*) as total_rows FROM chat"); 
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$x = $row['total_rows'];

$stmt = $dbc->prepare("INSERT into chat (id, text) values ('$id','$text')"); 
$stmt->execute();
$row = $stmt->rowCount();

$total = $x + $row;


if ($x != $total ){    
    $message = true;
} else{ 
    $message = false;
}

$message = json_encode($message);

echo $message;
 
?>