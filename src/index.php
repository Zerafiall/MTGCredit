<!DOCTYPE html>
<html lang="en">
<?php
    # include_once 'includes/dbc.php';
    include_once 'includes/functions.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MTGCredit</h1>

    <p>New Player:</p>
    <form  method="POST" >
        <label>First Name</label>
        <input type="text"
            name="FirstName"
            placeholder="First Name">
        </input>
        <br>
        <label>Last Name</label>
        <input type="text"
            name="LastName"
            placeholder="Last Name">
        </input>
        <br>
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

<!-- Search Field-->
    <!-- 
    <form action="includes/search.php" type="text">
        <label for="Search">Search</label>
        <input type="text" 
            name="seatchTerm" 
            placeholder="Search...">
        <input type="Submit" value="Submit">
    </form>
    -->

</body>
</html>
