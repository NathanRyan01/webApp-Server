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

$lat1 =  $data['lat1'];
$long1 =  $data['long1'];
$lat2 =  $data['lat2'];
$long2 =  $data['long2'];
$date =  $data['date'];
$distance =  $data['distance'];

$stmt = $dbc->prepare("SELECT lat1,long1,lat2,long2,distance from distance WHERE 
lat1='$lat1',long1='$long1'lat2='$lat2',long2='$long2'");
 
$stmt->execute();
 
$row = $stmt->rowCount();
 
if ($row > 0){    
    $message = true;
} else{ 
    $message = false;
}

$bool = json_encode($message);
echo $bool;
 
?>