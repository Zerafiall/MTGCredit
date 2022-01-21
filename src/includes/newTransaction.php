<?php
    include_once 'dbc.php';
    include_once 'functions.php';

function newTransaction( $playerID , $transDelta , $comment) {
    global $conn;

    $stmt = $conn -> prepare("call mtgcredit.NewTransaction(?, ?, ?);
    ;");
    $stmt -> bind_param("ids", $ID, $Amount, $this_comment);
    $ID = $playerID;
    $Amount = $transDelta;
    $this_comment = $comment;
    $stmt -> execute();

    showPlayerDetails($playerID);
    echo "Change made: " . $Amount . " for player " . $playerID ;
    $stmt -> close();
}
