<html>
<?php

    include_once 'includes/functions.php';
    $playerID = $_SESSION['currentPlayer'];
   
    
    echo '<h5 class="display-5">';
    getPlayerName($playerID);
    echo '</h5>';
    
    echo '<p class="text">';
    getBalance($playerID);
    echo '</p>';


    echo '<p>';
    getHistory5($playerID);
    echo '</p>';
    
   ?>
</html>
