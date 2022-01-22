<?php
    include_once 'dbc.php';
    include_once 'functions.php';

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

    $newPlayerString = $firstName . " " . $lastName;
    searchForPlayer($newPlayerString);

    echo "<br>";
    echo "New player " . $firstName . " added.";
    echo "<br>"; 
    $newPlayer->close();
}
