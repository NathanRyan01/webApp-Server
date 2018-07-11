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
 
$response = array();

$value = isset($_POST['id']) ? $_POST['id'] : '';

$stmt = $dbc->prepare("SELECT COUNT(*) as total_rows FROM person"); 
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$x = 1 + $row['total_rows'];
$total =  $value + $x;

$stmt = $dbc->prepare("SELECT COUNT(*) as total_rows FROM other"); 
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$x = 1 + $row['total_rows'];
$total =  $value + $x;

for ($i = $x; $i < $total; $i++){
    $stmt = $dbc->prepare("INSERT into person (id, value) values ('$i','test')"); 
    $stmt->execute();
    $row = $stmt->rowCount();
}

for ($i = $x; $i < $total; $i++){
    $stmt = $dbc->prepare("INSERT into other (row, value) values ('$i','test')"); 
    $stmt->execute();
    $row = $stmt->rowCount();
}

if ($x > 0){    
    $response['message'] = "completed";
} else{ 
    $response['message'] = "failed";
}

$response = json_encode($response);

echo $response;
 
?>