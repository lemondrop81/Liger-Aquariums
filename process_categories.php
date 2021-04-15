<?php

require ('connect.php');

$categoriesChosen = [];
$columns = [];

$swimPosition = filter_var($_POST['position'], FILTER_SANITIZE_SPECIAL_CHARS);

if($swimPosition != "Select State")
{
    $categoriesChosen[] = $swimPosition;
    $columns[] = 'swimPosition';
}


$Aggression = filter_var($_POST['aggression'], FILTER_SANITIZE_SPECIAL_CHARS);

if($Aggression != "Select Aggression")
{
    $categoriesChosen[] = $Aggression;
    $columns[] = 'aggression';
}

$tankMates = filter_var($_POST['tankMates'], FILTER_SANITIZE_SPECIAL_CHARS);

if($tankMates != "Select tank mates")
{
    $categoriesChosen[] = $tankMates;
    $columns[] = 'Tankmates';
}

$category = "";

for($i = 0; $i<count($categoriesChosen); $i++)
{
    $category .= $columns[$i];
    $category .= " = ";
    $category .= "'";
    $category .= $categoriesChosen[$i];
    $category .= "' ";
    
    if($i <count($categoriesChosen) -1)
    {
        $category .= ' && ';
    }
}

$query = "SELECT * FROM fish WHERE $category";
$statement = $db->prepare($query); // Returns a PDOStatement object.
$statement->execute(); // The query is now executed.
$fish= $statement->fetchAll();

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
            <h1><a href="index.php">Liger Aquariums - Categories</a></h1>
        </div> <!-- END div id="header" -->
        
        <?php require 'menu.php' ?> 
<div id="all_blogs">

            <h2>The category of: </h2>
            <?php foreach($categoriesChosen as $curent): ?>
                 <?= $curent ?>
            <?php endforeach ?>

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
