<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
 
//include database connection file

require_once ("config2.php");
 
$connect = connect();
 
$id = '';
$text = '';

$sql = ("SELECT * from chat where time > DATE_SUB(SYSDATE() , INTERVAL 9 SECOND)");

if($result = mysqli_query($connect,$sql))
{
  $count = mysqli_num_rows($result);
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
     $id = $row['id'];
     $text = $row['text'];
  }
}
 
$x = json_encode($id);
$y= json_encode($text);

echo "data:{$x}:{$y}\n\n";

flush();
 
?>