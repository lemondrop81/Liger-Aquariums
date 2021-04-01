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
            <h1><a href="homepage.php">Liger Aquariums - Log In</a></h1>
        </div> <!-- END div id="header" -->
        
        <?php require 'menu.php' ?>
        
<div id="all_blogs">
    <form action="process_login.php" method="post">

        <p>
            <label for="username">username</label>
            <input name="username" id="username" />
        </p>

        <p>
            <label for="password">Password</label>
            <input name="password" id="password" />
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


