<?php
    include_once 'dbc.php';
 
function getHistory5($playerID){
    echo "Last 5 Transactions: " . "<br><br>";
    global $conn;

    $stmt = $conn->prepare("call mtgcredit.GetHistory5(?);");
    $stmt->bind_param("i", $id);
    $id = $playerID; 
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            echo $row['Amount'].' '.$row['Date'].' '.$row['Comment'] . "<br>";
            echo "<br>";
          }
    } else {
        echo "0 results";
    }
    $conn->close();
}

