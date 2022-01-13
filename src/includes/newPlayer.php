<html>
    <body>

    <?php
    include_once 'dbc.php';
    
    $newPlayer = $conn->prepare('call mtgcredit.NewPlayer(?, ?);');
    $newPlayer->bind_param("ss", $firstName, $lastName);
    
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];

    $newPlayer->execute();

    echo <br>;
    echo "New Player " . $_POST["FirstName"] . " added."; 

    $newPlayer->close();


    ?>
    </body>
</html>