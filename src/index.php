<!DOCTYPE html>
<html lang="en">
<?php
    include_once 'includes/functions.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=""> <h1>MTGCredit</h1> </a>
    <!-- New Player --> 
    <p>New Player:</p>
    <form  method="POST" >
        <input type="text"
            name="FirstName"
            placeholder="First Name">
        </input>
        <br>
        <input type="text"
            name="LastName"
            placeholder="Last Name">
        </input>
        <input type="submit" value="Submit">
    </form>
    <br>
 
    <?php 
    if(isset($_POST['FirstName'])){
        if(isset($_POST['LastName'])){
            $fisrtName = $_POST['FirstName'];
            $lastName = $_POST['LastName'];
            newPlayer($fisrtName, $lastName);
        }
    }
    ?>

    <!-- Search for player --> 
    <form method="POST">
        <input type="text" 
            name="SearchTerm" 
            placeholder="Search...">
        <input type="Submit" value="Submit">
    </form>

    <?php 
    if(isset($_POST['SearchTerm'])){
        $searchTerm = $_POST['SearchTerm'];
        searchForPlayer($searchTerm);
    }
    ?>

    <form mothod="POST">
        <input type="number"
            name="TransAmount"
            placeholder="Change Amount">
        <br>
        <input type="text"
            name="Comment"
            placeholder="Comment">
        <input type="Submit" value="Submit">
    </form>

    <?php
    $selectedPlayer ;
    if(isset($_POST['TransAmmount'])){
        if(isset($_POST['Comment'])){
            $playerID = $selectedPlayer;
            $transAmount = $_POST['TransAmmount'];
            $comment = $_POST['Comment'];
            newTransaction($playerID, $transAmount, $comment);
        }
    }
    ?>

</body>
</html>
