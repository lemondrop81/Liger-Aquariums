<?php
    session_start();
    require 'connect.php';

    require 'validUsername.php';
    
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM users WHERE User_Id = $id";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $users = $statement->fetchAll(); 

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquarium - Edit User</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Liger Aquarium - Edit User</a></h1>
        </div> <!-- END div id="header" -->

        <?php require 'menu.php' ?>
        
<div id="all_blogs">
  <form action="process_user_post.php" method="post">
    <fieldset>            
            <?php foreach($users as $curent): ?>
              <div class = "fish_post">   

                <p>
                    <label for="User_Id">user id: <?= $curent['User_Id'] ?></label>
                    <input type="hidden" name="User_Id" id="User_Id" value="<?= $curent['User_Id'] ?>"/>
                </p>
                <p>
                    <label for="username">username</label>
                    <input name="username" id="username" value="<?= $curent['username'] ?>"/>
                </p>
                <p>
                    <label for="password">password</label>
                    <input name="password" id="password" value="<?= $curent['password'] ?>"/>
                </p>
                <p>
                    <label for="role">role</label>
                    <input name="role" id="role" value="<?= $curent['role'] ?>"/>
                </p>



            <?php endforeach ?>

        <input type="submit" name="command" value="Update" />
        <input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')" />
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
