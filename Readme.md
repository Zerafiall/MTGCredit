# To backup Database, run 
docker exec mtgcredit-db bash backupDB.sh

set up from: 
    https://www.youtube.com/watch?v=ThpnqYpvnIM


Template:

HTMl:

<?php
    include_once 'external.php'
?>
external.php can contain just html

    session_Start();

    include functions;

    Title

    [ Search for player ] [Submit]

    Echo currently selected player 

        if isset plyaerID {
            show player details 
        [ New Transaction ] [Sibmit]
        } else {
            show noting 
        }

    [ NewPlayer ] [Submit]
    echo sucsess 

Calls

    header('location: index.php?error=none');
    header('location: index.php?error= errorMsgGoesHere ');

    SearchForplayer.php
    NewTransaction.php
    NewPlayer.php

Functions 
    
    SeachForPlayer ( $searchTerm ) -> playerID {
        db ( call mtgcredit.SeachForPlayer( $searchTerm ) );
        return $playerID
    } ;
    
    SetSessionToID ( $playerID ){  // No return, just sets value
        $_SESSION['SelectedPlayer'] = $playerID;
    }

    GetHistory ( $playerID ) -> echos array ;
    
    GetBalance ( $playerID ) -> echos balance ;
    
    GetName ( $playerID ) -> echo FirstName . LastName ;
    
    NewPlayer ( $input fields ) {
        db ( call mtgcredit.NewPlayer (firstName, lastName) ) ;
        SetSessionToID();
    };
    
    NewTransaction ( $_SESSION['SelectedPlayer'], $Ammount, $Comment ) {
        $playerID = $_SESSION['SelectedPlayer']
        db ( call mtgcredit.NewTransaction ( $playerID, $Ammount, $Comment ));
        echo "Comfirmation";
        SetSessionToID( $playerID );

    }

## Callbacks
if(isset($_GET['error'])){
if($_GET['error']== errorMsgGoesHere ) {
echo " <p> Error Message </p>] ";
}
}

## Erro Handling 

if ( $stmt = $conn -> prepare (" ") == false ) {
    throw error 
}

## Log in systen 

if $_Cookie not set {
    Header -> src/login.php

    } else {
    stay at index.php
    }
