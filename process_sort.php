<?php
session_start();

require ('connect.php');

$submit = $_POST['command'];

if($submit == "Name_Ascending")
{
    $query = "SELECT * FROM fish ORDER BY commonName ASC";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
}

if($submit == "Size_Ascending")
{
    $query = "SELECT * FROM fish ORDER BY Size DESC";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
}

if($submit == "Date_Ascending")
{
    $query = "SELECT * FROM fish ORDER BY date DESC";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
}

if($submit == "Name_Descending")
{
    $query = "SELECT * FROM fish ORDER BY commonName DESC";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
}

if($submit == "Size_Descending")
{
    $query = "SELECT * FROM fish ORDER BY Size ASC";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
}

if($submit == "Date_Descending")
{
    $query = "SELECT * FROM fish ORDER BY date ASC";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
}

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
            <h1><a href="index.php">Liger Aquariums - Categories</a></h1>
        </div> <!-- END div id="header" -->
        
        <?php require 'menu.php' ?> 
<div id="all_blogs">
    <h2>Sorted by <?= $submit ?></h2>

            <?php $i = 0 ?>
            
            <?php foreach(array_reverse($fish) as $curent): ?>
                <div class = "fish_post">
                    <h2><a href="show.php?id=<?=$curent['fish_id'] ?>"><?= $curent['commonName'] ?></a> </h2>
                    <p>
                        Date: <?=  $curent['date'] ?> <a href="edit.php?id=<?=$curent['fish_id'] ?>">edit </a> <br>
                    </p>

                        <div class = "fish_content">
                            Tank Mates: <?= $curent['Tankmates'] ?> <br>
                            Aggression level: <?= $curent['Aggression'] ?> <br>
                            Full grown size: <?= $curent['Size'] ?>" <br>
                            pH: <?= $curent['pH'] ?> <br>
                            Water temperature: <?= $curent['Water_Temperature'] ?> F <br>
                            Swim position: <?= $curent['swimPosition'] ?> <br>
                        </div>
                </div>
                
                <?php $i++ ?>

                <?php if($i == 5) break; ?>

            <?php endforeach ?>
         
            
      
</div> <!-- END div id="wrapper" -->

<div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div>
</body>
</html>
