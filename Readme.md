# MTGCredit webapp

## Use 

This is just an webapp I wrote for a game shop that I go to. It insters and retrives data from a database to track users in store credit. 

## Installation

1. Docker, Docker-Compose
2. Set Up .env
3. Inport Database Tables and Procedures
4. Set up counter username and password

## Templates

### HTML

```
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
```

### Calls

SearchForplayer.php
NewTransaction.php
NewPlayer.php

### Functions 

```
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
```

### Callbacks

```
#### Send user back

header('location: index.php?error=none');
header('location: index.php?error= errorMsgGoesHere ');

#### Get send back info

if(isset($_GET['error'])){
    if($_GET['error']== errorMsgGoesHere ) {
        echo " <p> Error Message </p>] ";
    }
}
```

### Error Handling 

```
if ( $stmt = $conn -> prepare (" ") == false ) {
    throw error 
}
```

## Backup Database

Run `docker exec mtgcredit-db bash backupDB.sh`
Ideally add that to scipt and run from cron


## Credit

Credit to youtubers:
TruthSeekers for setting up docker containers:
    https://www.youtube.com/watch?v=ThpnqYpvnIM
Danni K for teaching enought PHP to build this: 
    https://www.youtube.com/watch?v=gCo6JqGMi30

