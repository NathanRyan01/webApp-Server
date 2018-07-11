<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
 
 
require_once ("config2.php");
 
$connect = connect();

$counter = 0;

$messages = array();
$sql = ("SELECT * from chat");
if($result = mysqli_query($connect,$sql)){
  $count = mysqli_num_rows($result);
  $cr = 0;
  while($row = mysqli_fetch_assoc($result)){
      $messages[$cr]['message'] = $row['message'];
      $cr++;
  }
}
$counter++;
$messages = json_encode($messages);
echo $messages;




?>