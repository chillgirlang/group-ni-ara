<?php
$servername = "localhost";
$username = "root";  // Change if you use a different username
$password = "root";      // Change if you set a MySQL password
$database = "soap_case_sys";
$port = 3306;  // Change if you have different a port


// Create connection
$conn = new mysqli($servername, $username, $password, $database,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
