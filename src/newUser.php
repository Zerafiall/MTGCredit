<?php

$servername = 'db';
$username = 'root';
$password = trim(fgets(STDIN)) ;
$newUserName = trim(fgets(STDIN));
$newUserPassword = trim(fgets(STDIN));

// Create connection
$conn = mysqli_connect($servername, $username, $password );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else  { 
    $stmt = $conn -> prepare("call mtgcredit.createUser( ?, ?);");
    $stmt->bind_param("ss", $newUserName, $hashedPassword);
    $hashedPassword = password_hash($newUserPassword, PASSWORD_DEFAULT);
    $stmt -> execute();
    $stmt -> close();
    exit();
}
