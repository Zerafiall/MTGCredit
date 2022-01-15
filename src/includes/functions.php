<?php
    include_once 'dbc.php';
    
    // Create connection
    // $servername = 'db';
    // $username = 'root';
    // $password = 'DEcaLbcqMoGLbfj7';

    // $conn = mysqli_connect($servername, $username, $password);

function newPlayer($firstName, $lastName) {
    // Check connection
    
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // Prepare statement. Pass func variables to statement. Execute Statement.   
    $newPlayer = $conn->prepare("call mtgcredit.NewPlayer(?, ?);");
    $newPlayer->bind_param("ss", $first_Name, $last_Name);
    $first_Name = $firstName;
    $last_Name = $lastName;
    $newPlayer->execute();

    // Echo out sucsess
    echo "<br>";
    echo "New player " . $firstName . " added."; 
    $newPlayer->close();
}

function searchForPlayer(string $searchTerm) {
    // Check connection
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set up prepared statements and paramaters.
    $searchForPlayer = $conn->prepare('call mtgcredit.SearchForPlayer(?, @PlayerRecivedID);');
    $searchForPlayer->bind_param("s", $search_Term);
    $search_Term = $searchTerm;
    
    // Send the query to the database. 
    $conn -> query('call SearchForPlayer( "$searchTerm" , @PlayerRecivedID);');
    $searchForPlayer->execute();

    // Query for the new set that is the output of the previouse query
    $results = $conn -> query ("SELECT @PlayerRecivedID as  _SearchForPlayer_out");
    $result = $results->fetch_assoc();

    // if (empty($searchForPlayer)){
    //     echo "No player with that name";
    // }
    echo $result['_SearchForPlayer_out'] ;

    $output = $result['_SearchForPlayer_out'];
    
    echo "<br>";
    getBalance($output);
    return $result['_SearchForPlayer_out'];

    $searchForPlayer->close();
}

function getBalance($playerID){
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

function getHistory5($playerID){
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

function newTransaction( $playerID , $transDelta , $comment) {

}

function setBalance( $playerID, $newBalance, $comment ) {

}
