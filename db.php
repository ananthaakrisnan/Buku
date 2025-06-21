<?php
// Database configuration file: db.php

$servername = "localhost";
$username = "root";  // your database username
$password = "";      // your database password
$dbname = "buku";    // your database name

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname); // Use $servername here

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
