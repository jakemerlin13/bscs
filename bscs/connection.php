<?php 
// session_start();
$host ="localhost";
$username ="root";
$password = "1234";
$database ="bscs";

$con = mysqli_connect($host, $username, $password, $database);
if(!$con){
    echo "Connection Failed";
}

?>