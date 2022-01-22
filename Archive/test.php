<?php

include_once 'includes/functions.php';


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

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            echo $row['Amount'].' '.$row['Date'].' '.$row['Comment'] . "<br>";
          }
    } else {
        echo "0 results";
    }
$conn->close();
}

showPlayerDetails(5);
