<?php
    require ('connect.php');

    $query = "SELECT * FROM fish";
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
            <h1><a href="homepage.php">Liger Aquariums - Home page</a></h1>
        </div> <!-- END div id="header" -->
        
<?php require 'menu.php' ?>

<div id="all_blogs">
            <?php $i = 0 ?>
            
            <?php foreach(array_reverse($fish) as $curent): ?>
                <div class = "fish_post">
                    <h2><?= $curent['commonName'] ?></a> </h2>
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