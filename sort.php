<?php
    require ('connect.php');
    session_start();

    $query = "SELECT * FROM swimposition";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $position= $statement->fetchAll();

    $query = "SELECT * FROM aggression";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $aggression= $statement->fetchAll();

    $query = "SELECT * FROM tankmates";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $tankMates= $statement->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums - Sort</title>

    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Liger Aquariums - Sort</a></h1>
        </div> <!-- END div id="header" -->
        
<?php require 'menu.php' ?>

<div id="all_blogs">
<form action="process_sort.php" method="post">
                <div class = "fish_post">

                <button type="submit" name="command" value="Name_Ascending">Sort by name ascending</button>
                <button type="submit" name="command" value="Size_Ascending">Sort by size ascending</button>
                <button type="submit" name="command" value="Date_Ascending">Sort by date ascending</button> <br>

                <button type="submit" name="command" value="Name_Descending">Sort by name descending</button>
                <button type="submit" name="command" value="Size_Descending">Sort by size descending</button>
                <button type="submit" name="command" value="Date_Descending">Sort by date descending</button>
                
                </div>    
</form> 
            
      
</div> <!-- END div id="wrapper" -->

<div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div>
</body>
</html>
