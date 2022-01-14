<?php
    // Create connection
    $servername = 'db';
    $username = 'root';
    $password = 'DEcaLbcqMoGLbfj7';

    $conn = mysqli_connect($servername, $username, $password);

function newPlayer( $firstName, $lastName ) {
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    global $conn;
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

    // Query for the new set that is the output of the reeviouse query
    $results = $conn -> query ("SELECT @PlayerRecivedID as  _SearchForPlayer_out");
    $result = $results->fetch_assoc();
    echo $result['_SearchForPlayer_out'] ;

    return $result['_SearchForPlayer_out'];

    $searchForPlayer->close();
}