<?php
include_once 'includes/dbc.php';
echo $servername;
echo $username;
echo $password;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="includes/login-inc.php" method="post">
        <input type="text"
                name="username"
                placeholder="username">
        </input>
        <br>
        <input type="text"
                name="password"
                placeholder="password">
        </input>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    </body>
</html>
