<?php
// Database configuration file: db.php

$servername = "localhost";
$username = "root";  // your database username
$password = "";      // your database password
$dbname = "buku";    // your database name



$conn = mysqli_connect($servername, $username, $password, $dbname); 


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
