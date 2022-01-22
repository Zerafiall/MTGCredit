<?php
session_start();
include_once 'functions.php';

if (!isset($_POST["submit"])) {
    header('location: ../index.php?error=funcNewPlayerNotCalled');
} else {
    // Error handling goers here
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    newPlayer($firstName, $lastName);
}

