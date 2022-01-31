<?php
include_once 'includes/dbc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container-md">    
    <h1 class="text-center">
        Login to MTGCredit
    </h1>
    <form action="includes/login-inc.php" method="post">
    <div class="mb-3">
        <input  type="text"
                name="username"
                placeholder="username"
                class="form-control"
        </input>
        <br>
        <input  type="password" 
                name="password"
                placeholder="password"
                class="form-control">
        </input>
        <br>
        <button type="submit" 
                name="submit"
                class="btn btn-primary">
            Submit
        </button>
    </div>
    </form>
    </div>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
