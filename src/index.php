<?php
    session_start();
    include_once 'includes/functions.php';
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
    <a href=""> <h1>MTGCredit</h1> </a>

<?php
    if (!isset($_SESSION['currentPlayer'])){
        echo "No player selected";
    } else {
        echo "Selected player: " . $_SESSION['currentPlayer'];
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

    <form method="POST">
        <input type="number"
            step="0.01"
            name="TransAmount"
            placeholder="Change Amount">
        <br>
        <input type="text"
            name="Comment"
            placeholder="Comment">
        <input type="Submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['TransAmount'])){
        if(isset($_POST['Comment'])){
                $playerID = $_SESSION['currentPlayer'];
                $transAmount = $_POST['TransAmount'];
                $comment = $_POST['Comment'];
                newTransaction($playerID, $transAmount, $comment);
        }
    }
    ?>

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
</body>
</html>
