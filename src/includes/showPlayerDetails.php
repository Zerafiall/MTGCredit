<?php

include_once 'dbc.php';
include_once 'functions.php';

function showPlayerDetails($playerID) {
    global $conn ;
    echo "<br>";
    getPlayerName($playerId);
    echo "<br>";
    getBalance($playerID);
    echo "<br>";
    getHistory5($playerID);

}