<?php

$host = "localhost";
$user = "shivaami_rahul";
$pass = "Rah@2135";
$db = "shivaami_webhost";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
