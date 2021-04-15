<?php

require ('connect.php');
session_start();

    if($_GET['search'] == null)
    {
        header("Location: index.php");
    }

    $search = "'%";
    $search .= filter_var($_GET['search'], FILTER_SANITIZE_SPECIAL_CHARS);
    $search .= "%'";

    $query = "SELECT * FROM fish WHERE commonName LIKE $search ";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 


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
            <h1><a href="index.php">Liger Aquariums - Search</a></h1>
        </div> <!-- END div id="header" -->
        
        <?php require 'menu.php' ?> 
<div id="all_blogs">

            <h2>The search of: <?= $_GET['search'] ?> </h2>

            <?php $i = 0 ?>
            
            <?php foreach(array_reverse($fish) as $curent): ?>
                <div class = "fish_post">
                    <h2><a href="show.php?id=<?=$curent['fish_id'] ?>"><?= $curent['commonName'] ?></a> </h2>
                    
                    <?php if($curent['image']): ?>

                        <img src="data:image/gif;base64,<?php echo base64_encode($curent['image']);?>" /> <br>

                    <?php endif ?>
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
