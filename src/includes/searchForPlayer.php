<?php
session_start();
if (!isset($_POST["submit"])) {
    header('location: ../index.php?error=funcSearchNotCalled');
} else {
   
    include_once 'dbc.php';

    global $conn;
    if ($conn->connect_error) {
        header('location: index.php?error=connFailed');
    }

    // Set up prepared statements and paramaters.
    $searchForPlayer = $conn->prepare('call mtgcredit.SearchForPlayer(?, @PlayerRecivedID);');
    $searchForPlayer->bind_param("s", $searchTerm);
    $conn -> query('call SearchForPlayer( "$searchTerm" , @PlayerRecivedID);');

    // Send the query to the database. 
    $searchTerm = $_POST['searchTerm'];
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
