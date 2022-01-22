<?php
    include_once 'dbc.php';

function getBalance($playerID){
    echo "Player Balance: ";
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

    echo "$<b>". $result['_GetBalance_out']."</b>";

    $stmt -> close();
}

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

function getHistoryX($playerID){
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set up prepared statements and paramaters.
    $stmt = $conn->prepare(" call mtgcredit.QueryName ( ?, @OutputVar );");
    $stmt -> bind_param ( "input types" , $in_Var, $in_Var);

    // Send the query to the database. 
    $in_Var = #inVar;
    $stmt -> execute();

    // if outputs
    // Query for the new set that is the output of the previouse query
    $results = $conn -> query ("SELECT @OutputVar as _QueryName_out");
    $result = $results -> fetch_assoc();
    return $result['_QueryName_out'];

    $stmt -> close();
}

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
            echo "PlayerName: " . $row['FirstName'] . " " . $row['LastName'];
        } else {
            echo "Oops.";
        }
    } else {
        echo "Num_row not > 0";
    }
}

function newPlayer($firstName, $lastName) {
    // Check connection
    
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // Prepare statement. Pass func variables to statement. Execute Statement.   
    $newPlayer = $conn->prepare("call mtgcredit.NewPlayer(?, ?);");
    $newPlayer->bind_param("ss", $firstName, $lastName);
    $newPlayer->execute();
    header('location: ../index.php?error=newPLayerSucsess');

    $newPlayer->close();
}       

function newTransaction($id, $amount, $comment){
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

function serachForPlayer($searchTerm){
    global $conn;
    if ($conn->connect_error) {
        header('location: index.php?error=connFailed');
    }

    // Set up prepared statements and paramaters.
    $searchForPlayer = $conn->prepare('call mtgcredit.SearchForPlayer(?, @PlayerRecivedID);');
    $searchForPlayer->bind_param("s", $searchTerm);
    $conn -> query('call SearchForPlayer( $searchTerm , @PlayerRecivedID);');

    // Send the query to the database. 
//    $searchTerm = $_POST['searchTerm'];
    $searchForPlayer->execute();

    // Query for the new set that is the output of the previouse query
    $results = $conn -> query ("SELECT @PlayerRecivedID as  _SearchForPlayer_out");
    $result = $results->fetch_assoc();

    if (empty($result['_SearchForPlayer_out'])){
        $_SESSION['currentPlayer'] = null;
        header('location: ../index.php?error=playerNotFound');
        $searchForPlayer->close();
    } else {
        $output = $result['_SearchForPlayer_out'];
        $_SESSION['currentPlayer'] = $output;
        header('location: ../index.php?error=searchSuccess');
        $searchForPlayer->close();
    } 
}
