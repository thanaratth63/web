<?php
$servername = 'localhost'; //"127.0.0.1"
$username = 'root';
$password = '1234';
$dbname = 'iphoneshop_1';
$port = 3306;

//$conn = new mysqli("localhost","root", "1234", "iphoneshop_1", 3306);
$conn = new mysqli($servername, $username, $password, $dbname,$port);


if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

//echo "Successfully connected";

$conn->set_charset('utf8');

?>