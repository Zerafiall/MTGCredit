<?php
    include_once 'dbc.php';

function getBalance($playerID){
    global $conn;
    $stmt = $conn->prepare("call mtgcredit.GetBalance(?, @BalanceForPlayer);");
    $stmt -> bind_param ( "i" , $playerID);
    $stmt -> execute();

    $results = $conn -> query ("SELECT @BalanceForPlayer as _GetBalance_out");
    $result = $results -> fetch_assoc();

    echo 'Balance: <strong> $'.$result['_GetBalance_out']."</strong>";
    

    $stmt -> close();
}

function getHistory5($playerID){
    echo "Last 5 Transactions: ";
    global $conn;

    $stmt = $conn->prepare("call mtgcredit.GetHistory5(?);");
    $stmt->bind_param("i", $id);
    $id = $playerID; 
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            
            echo '<div class="row">';

            echo 
                '<div class="col">'.
                $row['Comment'].
                '</div>
                <div class="col">'.
                $row['Date'].
                '</div>
                <div class="col text-end">$ ' .
                $row['Amount'].
                '</div><div class="col"></div>'; 
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

function getHistoryX($playerID){
    global $conn;
    
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
            echo $row['FirstName'] . " " . $row['LastName'];
        } else {
            echo "Oops.";
        }
    } else {
        echo "Num_row not > 0";
    }
}

function newPlayer($firstName, $lastName) {
    global $conn;
    $newPlayer = $conn->prepare("call mtgcredit.NewPlayer(?, ?);");
    $newPlayer->bind_param("ss", $firstName, $lastName);
    $newPlayer->execute();
    header('location: ../index.php?error=newPLayerSucsess');
    $newPlayer->close();
}       

function newTransaction($id, $amount, $comment){
    global $conn;
    
    $stmt = $conn -> prepare("call mtgcredit.NewTransaction(?, ?, ?);");
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

    // Set up prepared statements and paramaters.
    $searchForPlayer = $conn->prepare('call mtgcredit.SearchForPlayer(?, @PlayerRecivedID);');
    $searchForPlayer->bind_param("s", $searchTerm);
    $conn -> query('call SearchForPlayer( $searchTerm , @PlayerRecivedID);');
    // Send the query to the database. 
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

function emptyInputLogin($username, $password){
    $result;
    if ( empty($username) || empty($password) ){
        $result == true;
    } else {
        $result == false;
    }
    return $result;
}

function loginUser($username, $password){
    $uidExists = uidExists($username);
    if ( $uidExists == false ) {
        header('location: ../login.php?error=invaladCreds');
        exit();
    }
    $passwordHashed = $uidExists['usersPWD'];
    $checkPassword = password_verify( $password, $passwordHashed );
    if ($checkPassword == false ){
        header('location: ../login.php?error=invaladCreds');
        exit();
    } else if ($checkPassword == true ){
        session_start();
        $_SESSION['usersID'] = $uidExists['usersID']; 
        header('location: ../index.php?error=welcomeHome');
    }
}

function uidExists($username){
    global $conn;
    $results;
    $stmt = $conn -> prepare("call mtgcredit.loginUser(?);");
    $stmt->bind_param('s', $username);
    $stmt -> execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0 ){
        if ($row = $result -> fetch_assoc()){
            return $row;
        } else {
            $results = false;
            return $results;
        }
    }
    $conn -> close();
}
