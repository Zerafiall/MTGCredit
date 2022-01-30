<?php
session_start();
if ( !isset($_SESSION['usersID'])){
    header('location: login.php?error=pleaseLogIn');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>MTG Credit</title>
</head>
<body>
    <a href="index.php?error=welcomeHome"> <h1>MTGCredit</h1> </a>
    <a href="includes/clear.php">Exit</a>

    <!-- Search for player --> 
    <form action="includes/searchForPlayer.php" method="post">
        <input type="text" name="searchTerm" placeholder="Search...">
        <button type="submit" name="submit">Search</button>
    </form>
    <br> 

    <!-- Show Selected Player -->
    <?php
        if (!isset($_SESSION['currentPlayer'])){
            echo "No player selected";
        } else {
            include_once 'html/showPlayerDetails.php';
            include_once 'html/newTransaction.php';
        }        
    ?>

<!-- New Player -->  
    <p>New Player:</p>
    <form action="includes/newPlayer.php" method="post">
        <input type="text"
            name="FirstName"
            placeholder="First Name">
        </input>
        <br>
        <input type="text"
            name="LastName"
            placeholder="Last Name">
        </input>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

