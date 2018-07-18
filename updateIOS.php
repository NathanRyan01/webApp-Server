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
 
$message = "";
$id =  $_POST['id'];
$value =  $_POST['value'];

$stmt = $dbc->prepare("UPDATE person SET value = '$value' WHERE id = '$id'");
$stmt->execute();
$row = $stmt->rowCount();

if ($row > 0){    
    $response['message'] = "completed";
} else{ 
    $response['message'] = "failed";
}

$response = json_encode($response);

echo $response;
 
?>