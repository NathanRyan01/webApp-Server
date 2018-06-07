<?php

try{
    $dbc = new PDO("mysql:host=localhost;dbname=thesis","root","")
    or die("Unable to connect");

}
catch(PDOException $e){
    echo "Error:";
}
?>