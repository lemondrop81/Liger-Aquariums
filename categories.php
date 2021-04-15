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

    $query = "SELECT * FROM users";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $people= $statement->fetchAll();

    $query = "SELECT * FROM tankmates";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $tankMates= $statement->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums - Categories</title>

    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Liger Aquariums - Categories</a></h1>
        </div> <!-- END div id="header" -->
        
<?php require 'menu.php' ?>

<div id="all_blogs">
<form action="process_categories.php" method="post">
                <div class = "fish_post">
                <p>
                    <label> Swim Position</label>
                    <select name="position" id="position">
                        <option> Select State </option>
                        <?php foreach($position as $set): ?>
                            <label> Select State </label>
                            <option><?=  $set['position'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p>
                    <label> Aggression</label>
                    <select name="aggression" id="aggression">
                        <option> Select Aggression </option>
                        <?php foreach($aggression as $set): ?>
                            <label> Select Aggression </label>
                            <option><?=  $set['behaviour'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p>
                    <label> tankMates</label>
                    <select name="tankMates" id="tankMates">
                        <option> Select tank mates </option>
                        <?php foreach($tankMates as $set): ?>
                            <label> Select tank mates </label>
                            <option><?=  $set['tankMates'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                
                </div>    

        <input type="submit" name="command" value="Search" />
      </p>

</form> 
            
      
</div> <!-- END div id="wrapper" -->

<div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div>
</body>
</html>
