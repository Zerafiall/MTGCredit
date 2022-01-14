<html>
    <body>

    <?php
    include_once 'dbc.php';
    
    $searchForPlayer = $conn->prepare('call mtgcredit.SearchForPlayer(?, @PlayerRecivedID);');
    $searchForPlayer->bind_param("s", $searchTerm);
    
    $searchTerm= $_POST["seatchTerm"];

    $searchForPlayer->execute();

    echo "<br>";

    

    $searchForPlayer->close();

    ?>
    </body>
</html>