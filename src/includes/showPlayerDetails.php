<?php

include_once 'dbc.php';
include_once 'functions.php';

function showPlayerDetails($playerID) {
    global $conn ;
    echo "<br>";
    getPlayerName($playerID);
    echo "<br>";
    getBalance($playerID);
    echo "<br>";
    getHistory5($playerID);
}
