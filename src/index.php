<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php?error=welcomeHome"> <h1>MTGCredit</h1> </a>
   
    <!-- Search for player --> 
    <form action="includes/searchForPlayer.php" method="post">
        <input type="text" name="searchTerm" placeholder="Search...">
        <button type="submit" name="submit">Search</button>
    </form>
    
    <!-- Show Selected Player -->
    <?php
    if (!isset($_SESSION['currentPlayer'])){
        echo "No player selected";
    } else {
        $currentPlayer = $_SESSION['currentPlayer'];
        echo  $currentPlayer ;
        include_once 'html/newTransaction.php';
    }        
    ?>
    
    

    <!-- 
    New Player 
    <p>New Player:</p>
    <form action="includes/newPlayer.php" method="POST">
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
    // if(isset($_POST['FirstName'])){
    //     if(isset($_POST['LastName'])){
    //         $fisrtName = $_POST['FirstName'];
    //         $lastName = $_POST['LastName'];
    //         newPlayer($fisrtName, $lastName);
    //     }
    // }
    ?> 
    -->

</body>
</html>
