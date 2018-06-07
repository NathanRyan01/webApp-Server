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
 
$message = "5";
echo $message;

$stmt = $dbc->prepare("DELETE FROM CHAT");
$stmt->execute();
$row = $stmt->rowCount();

 
if (($row != 0)){    
    $message = false;
} else{ 
    $message = true;
}

$message = json_encode($message);

echo $message;
 
?>