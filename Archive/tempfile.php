<?php

include_once 'includes/dbc.php';

function showPlayerDetails($playerID) {
    global $conn ;
    echo "<br>";
    playerName($playerId);
    echo "<br>";
    playerBal($playerID);
    echo "<br>";
    playerHistory($playerID);

}

function playerName($ID) {
    echo "Name" ;
}
    // PLayerBal (ID) -> Decibel 
    // GetHistory5 (ID) -> Array [ Ammount , Date , Comment]

function playerBal($ID) {
    echo "5.00";
}

function playerHistory($ID) {
    global $conn;

    $stmt = $conn->prepare("call mtgcredit.GetHistory5(?);");
    $stmt->bind_param("i", $id);
    $id = $ID; 
    $stmt->execute();
    $result = $stmt->query();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["PlayerID"]. " - Name: " . $row["Amount"]. " " . $row["Comment"] . " " . $row["Date"] . "<br>";
        } 
    } else {
        echo "0 results";
    }
$conn->close();
}

showPlayerDetails(4);