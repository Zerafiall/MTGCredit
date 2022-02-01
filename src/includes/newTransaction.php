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
    
    if (empty($amount)){
        header('location: ../index.php?error=emptyField'); 
    } elseif(empty($comment)){
        header('location: ../index.php?error=emptyField'); 
    } else {
        newTransaction($id, $amount, $comment);
    } 
}

