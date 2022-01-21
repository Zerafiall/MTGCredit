<?php
    include_once 'functions.php';

function searchForPlayer($searchTerm) {
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

    if (empty($result['_SearchForPlayer_out'])){
        echo "No player with that name";
    }

    $output = $result['_SearchForPlayer_out'];
    session_start();
    $_SESSION['currentPlayer'] = $output;
    showPlayerDetails($output);
    $searchForPlayer->close();
}
