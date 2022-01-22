<?php
session_start();
include_once 'functions.php';

if (!isset($_POST["submit"])) {
    header('location: ../index.php?error=funcSearchNotCalled');
} else {
    // Error handling goers here
    $id = $_SESSION['currentPlayer'];
    $amount = $_POST['transAmount'];
    $comment = $_POST['comment'];
    newTransaction($id, $amount, $comment);
} 
