<?php
    require ('connect.php');
    session_start();


    if($_GET['search'] == null)
    {
        header("Location: users.php");
    }

    $search = "'%";
    $search .= filter_var($_GET['search'], FILTER_SANITIZE_SPECIAL_CHARS);
    $search .= "%'";

    $query = "SELECT * FROM users WHERE username LIKE $search ";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $users = $statement->fetchAll(); 
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
            <h1><a href="index.php">Liger Aquariums - Users</a></h1>
        </div> <!-- END div id="header" -->
        
<?php require 'menu.php' ?> 

<div id="all_blogs">
            <br>
            <form class="search" action="searchUsers.php">
                <input type="text" placeholder="Search users" name="search">
                <button type="submit">Search</button>
            </form>
            
            <?php foreach(array_reverse($users) as $curent): ?>
                <div class = "fish_post">           

                Username: <?= $curent['username'] ?> Role: <?= $curent['role'] ?> <a href="editUsers.php?id=<?=$curent['User_Id'] ?>">edit </a> <br>

                        
                </div>
                



            <?php endforeach ?>
         
            
      
</div> <!-- END div id="wrapper" -->

<div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div>
</body>
</html>
