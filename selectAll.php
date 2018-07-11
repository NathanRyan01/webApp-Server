<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

 
//include database connection file

require_once ("config2.php");
 
$connect = connect();
 
$people = array();

$sql = ("SELECT * from person");

if($result = mysqli_query($connect,$sql))
{
  $count = mysqli_num_rows($result);
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
      $people[$cr]['id']    = $row['id'];
      $people[$cr]['value']  = $row['value'];
      $cr++;
  }
}
 
$people = json_encode($people);

echo $people;
 
?>