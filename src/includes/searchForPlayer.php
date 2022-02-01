<?php
session_start();
include_once 'functions.php';

if (!isset($_POST["submit"])) {
    header('location: ../index.php?error=funcSearchNotCalled');
} else {
    $searchTerm = $_POST['searchTerm'];
    if(empty($searchTerm)){
        header('location: ../index.php?error=emptyField');
    } else {
        serachForPlayer($searchTerm);
    }
}

