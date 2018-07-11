<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

 
//include database connection file

require_once ("config.php");

$wiki = "https://en.wikipedia.org/w/api.php?action=parse&format=json&page=Dwayne_Johnson";

$response  = json_decode( file_get_contents($wiki),true );

$message = json_encode($response);

echo $message;
 
?>