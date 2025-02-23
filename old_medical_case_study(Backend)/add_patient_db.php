<?php
$host = "localhost";
$dbname = "patient_db";
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
