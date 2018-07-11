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
 
$response = array();

$stmt = $dbc->prepare("DELETE FROM PERSON");
$stmt->execute();
$rowOne = $stmt->rowCount();

$stmt = $dbc->prepare("DELETE FROM OTHER");
$stmt->execute();
$rowTwo = $stmt->rowCount();
 
if (($rowOne != 0) || ($rowTwo != 0)){      
        $response['message'] = "completed";
    } else{ 
        $response['message'] = "failed";
}
    

$response = json_encode($response);

echo $response;
 
?>