<?php

$host = "localhost";
$user = "root";//shivaami_rahul
$pass = "Admin123#";//Rah@2135
$db = "shivaami_webhost";//shivaami_webhost

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
