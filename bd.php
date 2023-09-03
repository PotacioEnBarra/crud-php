<?php 

$server = "localhost";
$namedb = "app";
$user = "root";
$password = "";

try{
    $con = new PDO("mysql:host=$server;dbname=$namedb",$user, $password);
}catch(Exception $e){
    echo $e->getMessage();
}

?>