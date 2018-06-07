<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
 
//include database connection file

require_once ("config.php");

$wrestler = array();

$xml = simplexml_load_file("test.xml") or die("Error: Object Creation failure");

$xml = json_encode($xml);


echo $xml;

flush();


?>