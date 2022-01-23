<?php

$servername = 'db';
$username = 'root';
$password = getenv("MYSQL_ROOT_PASSWORD");

// Create connection
$conn = mysqli_connect($servername, $username, $password );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
