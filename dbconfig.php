<?php
$servername = "imc.kean.edu";
$dbname = "seds2017";
$username = "seds2017";
$password = "2017fall";

// Create connection
$conn = new mysqli($servername, $dbname, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
