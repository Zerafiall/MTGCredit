<?php

    include_once 'dbc.php';

function getBalance($playerID){
    echo "Getting ballance... " . "<br>";
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare(" call mtgcredit.GetBalance(?, @BalanceForPlayer);");
    $stmt -> bind_param ( "i" , $player_ID);
    $player_ID = $playerID;

    $stmt -> execute();

    $results = $conn -> query ("SELECT @BalanceForPlayer as _GetBalance_out");
    $result = $results -> fetch_assoc();

    echo "$". $result['_GetBalance_out'];

    $stmt -> close();
}

