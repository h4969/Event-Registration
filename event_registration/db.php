<?php
$servername = "localhost";
$username   = "root";    // your MySQL username
$password   = "";        // your MySQL password
$dbname     = "eventdb"; // database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
