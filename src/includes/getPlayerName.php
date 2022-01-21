<?php

include_once 'dbc.php';

function getPlayerName($playerID){
    
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set up prepared statements and paramaters.
    $stmt = $conn->prepare("call mtgcredit.GetPlayerName(?);");
    $stmt->bind_param("i", $id);
    $id = $playerID;
    // Send the query to the database. 
    $stmt -> execute();

    // if outputs
    // Query for the new set that is the output of the previouse query
  
    $result = $stmt->get_result();
    if ($result->num_rows > 0){
        if ($row = $result->fetch_assoc()){
            echo "PlayerName: " . $row['FirstName'] . $row['lastname'];
        } else {
            echo "Oops.";
        }
    } else {
        echo "Num_row not > 0";
    }
}
        
