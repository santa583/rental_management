<?php
// db/db_connection.php

$servername = "localhost"; // or "127.0.0.1"
$username = "root"; // default XAMPP username
$password = ""; // password default is empty for XAMPP
$dbname = "rental_management"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
