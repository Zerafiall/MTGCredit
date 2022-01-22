<?php
session_start();
include_once 'functions.php';

if (!isset($_POST["submit"])) {
    header('location: ../index.php?error=funcSearchNotCalled');
} else {
    // Error handling goers here
    $searchTerm = $_POST['searchTerm'];
    serachForPlayer($searchTerm);
} 
