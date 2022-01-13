<?php

$dbServer = 'db';
$dbUsername = 'root';
$dbPasswd = 'DEcaLbcqMoGLbfj7';
$dbName = 'mtgcredit';

$conn = mysqli_connect($dbServer,
                    $dbUsername,
                    $dbPasswd,
                    $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}