<?php
    session_start();
    require 'validUsername.php';
  
    require ('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums - New User</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="homepage.php">Liger Aquariums - New User</a></h1>
        </div> <!-- END div id="header" -->

        <?php require 'menu.php' ?>

<div id="all_blogs">
  <form action="insertuser.php" method="post">
    <fieldset>
      <legend>Add new User</legend>
      <p>
        <label for="username">Enter username</label>
        <input name="username" id="username" />
      </p>
      <p>
        <label for="password1">Enter password</label>
        <input name="password1" id="password1" />
      </p>
      <p>
        <label for="password2">Enter the password again</label>
        <input name="password2" id="password2" />
      </p>
      <p>
        <label for="role">Enter the role</label>
        <input name="role" id="role" />
      </p>
      
      <p>
        <input type="submit" name="command" value="Create" />
      </p>
    </fieldset>
  </form>
</div>
        <div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
