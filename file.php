<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
 
//include database connection file

require_once ("config.php");

$data = json_decode( file_get_contents("php://input"),true );

$number =  $data['value'];

$file = " ";

if($number == "100"){
    $file = "test100.xml";
}
elseif($number == "1000"){
    $file = "test1000.xml";
}
elseif($number == "10000"){
    $file = "test10000.xml";
}
else{
    $file = "test100000.xml";
}

$wrestler = array();

$xml = simplexml_load_file($file) or die("Error: Object Creation failure");

$xml = json_encode($xml);

echo $xml;

flush();


?>