<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require_once ("config2.php");
 
$connect = connect();
 
$people = array();
 
$data = json_decode( file_get_contents("php://input"),true );

$value =  $data['message'];

$sql1 = ("INSERT into chat (message) values ('$value')");

$result = mysqli_query($connect,$sql1);

$sql2 = ("SELECT * from chat");

if($result = mysqli_query($connect,$sql2)){
  $count2 = mysqli_num_rows($result);
  $cr = 0;
    while($row = mysqli_fetch_assoc($result)){
          $people[$cr]['message'] = $row['message'];
          $cr++;
    }
}
$people = json_encode($people);

echo $people;


?>