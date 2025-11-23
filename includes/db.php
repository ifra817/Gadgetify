<?php

$servername="localhost";
$username = "root";
$password = "";
$dbname= "gadgetify_db";

$conn = new sqli($servername,$username,$password,$dbname);

if ( $conn -> connect_error){
    die("connection failed.. ".$conn->connect_error);

}

?>