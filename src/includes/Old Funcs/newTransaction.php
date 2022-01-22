<?php
session_start();
if( !isset($_POST["submit"])) {
    header('location: ../index.php?error=funcNotCalled');
} else {
    include_once 'dbc.php';

    global $conn;
    if ($conn->connect_error) {
        header('location: index.php?error=connFailed');
    }

    $stmt = $conn -> prepare("call mtgcredit.NewTransaction(?, ?, ?);
    ;");
    $stmt -> bind_param("ids", $id, $amount, $comment);
    $id = $_SESSION['currentPlayer'];
    $amount = $_POST['transAmount'];
    $comment = $_POST['comment'];

    $stmt -> execute();
    $stmt -> close();
    header('location: ../index.php?error=transSucsess');
}

