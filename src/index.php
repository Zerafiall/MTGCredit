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

<!-- navbar-->
    <div class="navbar bg-dark">    
        <div class="container-md">
        <a class="navbar-brand" href="index.php?error=welcomeHome">
            <span class="fw-bold text-white">
                MTGCredit
            </span>
        </a>
        <a class="btn btn-outline-danger" href="includes/clear.php">
            Logout
        </a>
        </div>
    </div>

    <!-- Search for player --> 
    <br>
    <div class="container-md">
        <div class="row ">
            <form action="includes/searchForPlayer.php" method="post"> 
            <div class="col p-1">
                <input  type="text" 
                        name="searchTerm" 
                        placeholder="Search..."
                        class="form-control">
            </div>
            <div class="col-md-2  p-1">
                <button type="submit" 
                        name="submit"
                        class="form-control">Search</button>
            </div>
            </form>
        </div>    
    </div>
    <br> 

    <!-- Show Selected Player -->
    <div class="container-md">
    <div class="card mx-auto">
    <?php
        if (!isset($_SESSION['currentPlayer'])){
            echo "No player selected";
        } else {
            include_once 'html/showPlayerDetails.php';
            include_once 'html/newTransaction.php';
        }        
    ?>
    </div>
    </div>

<!-- New Player -->  
    <br>
    
    <div class="container-md">
    
    <p></p>
    
    <form action="includes/newPlayer.php" method="post">

            <label class="form-label" >   
                New Player
            </label>
        <div class="row">
        <div class="col-5">
            <input type="text"
                name="FirstName"
                placeholder="First Name"
                class="form-control">
            </input>
        </div>    
        <div class="col-5">
            <input type="text"
                name="LastName"
                placeholder="Last Name"
                class="form-control">
            </input>
        </div>    
        <div class="col-2">
            <button type="submit" 
                    name="submit"
                    class="btn btn-outline-primary">
                Submit
            </button>

        </div>
    </form>
    
    </div>

</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

