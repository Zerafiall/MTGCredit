<?php

$servername = 'db';
$username = 'root';
$password = ' '; # Password for database goes here. Use .env file to store password.
// Create connection
$conn = mysqli_connect($servername, $username, $password );


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
