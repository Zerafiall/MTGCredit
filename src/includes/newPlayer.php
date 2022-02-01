<?php
session_start();
include_once 'functions.php';

if (!isset($_POST["submit"])) {
    header('location: ../index.php?error=funcNewPlayerNotCalled');
} else {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    
    if(empty($firstName)){
        header('location: ../index.php?error=emptyField');
    } elseif(empty($lastName)) {
        header('location: ../index.php?error=emptyField');
    } else {
        newPlayer($firstName, $lastName);
    }
}

