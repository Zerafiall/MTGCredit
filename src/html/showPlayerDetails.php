<html>
<?php

    include_once 'includes/functions.php';
    $playerID = $_SESSION['currentPlayer'];
    echo "<br>";
    getPlayerName($playerID);
    echo "<br>";
    getBalance($playerID);
    echo "<br>";
    getHistory5($playerID);

?>
</html>

