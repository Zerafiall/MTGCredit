<?php

function newPlayer( $firstName, $lastName ) {
    $servername = 'db';
    $username = 'root';
    $password = 'DEcaLbcqMoGLbfj7';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $newPlayer = $conn->prepare("call mtgcredit.NewPlayer(?, ?);");
    $newPlayer->bind_param("ss", $first_Name, $last_Name);
    $first_Name = $firstName;
    $last_Name = $lastName;
    $newPlayer->execute();

    echo "<br>";

    echo "New player " . $firstName . " added."; 

    $newPlayer->close();

}

function searchForPlayer($searchTerm) {
    $searchForPlayer = $conn->prepare('call mtgcredit.SearchForPlayer(?, @PlayerRecivedID);');
    $searchForPlayer->bind_param("s", $searchTerm);
    
    $searchTerm= $_POST["seatchTerm"];

    $searchForPlayer->execute();

    echo "<br>";

    

    $searchForPlayer->close();
}