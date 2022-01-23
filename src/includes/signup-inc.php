<?php

if (!isset($_POST['submit'])){
    header('location: ../login.php');
    exit();
} else {
    include_once 'functions.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // error handling 
    createUser($username, $password);
    exit();
}
