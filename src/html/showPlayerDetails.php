<html>
<?php

    include_once 'includes/functions.php';
    $playerID = $_SESSION['currentPlayer'];
   
    echo ' <div class="card-body"> ';
    
    echo ' <h5 class="card-title"> ';
    getPlayerName($playerID);
    echo "</h5>";
    
    echo ' <p class="card-text"> ';
    getBalance($playerID);
    echo ' </p> ';
    
    echo ' <p class="card-text"> ';
    getHistory5($playerID);
    echo ' </p> ';

    echo "</div>";

?>
</html>
