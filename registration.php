<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="homepage.php">Liger Aquariums - Register</a></h1>
        </div> <!-- END div id="header" -->
        
    <?php require 'menu.php' ?>

<div id="all_blogs">
    <form action="process_register.php" method="post">

        <p>
            <label for="username">username</label>
            <input name="username" id="username" />
        </p>

        <p>
            <label for="password1">Password</label>
            <input name="password1" id="password1" />
        </p>

        <p>
            <label for="password2">Enter your password again</label>
            <input name="password2" id="password2" />
        </p>

        <p>
        <input type="submit" name="command" value="submit" />
      </p>
    </form>     
            
      
</div> <!-- END div id="wrapper" -->

<div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div>
</body>
</html>


