<!DOCTYPE html>
<html lang="en">
<?php
    include_once 'includes/dbc.php'
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MTGCredit</h1>

    <?php
    
    $DevPlayerID = 5
    
    ?>

    <p>New Player:</p>
    <form method="POST" action="newPlayer.php">
        <label>First Name</label>
        <input type="text"
            id="FirstName"
            placeholder="First Name">
        </input>
        <br>
        <label>Last Name</label>
        <input type="text"
            id="LastName"
            placeholder="Last Name">
        </input>
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>


    <!-- Search Field-->

    <form action="Search.php" type="text">
        <label for="Search">Search</label>
        <input type="text" 
            id="SearchField" 
            name="SearchField" 
            placeholder="dan">
        <input type="Submit" value="Submit">
    </form>


</body>
</html>
