<?php
    require ('connect.php');

    $query = "SELECT * FROM fish";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $fish= $statement->fetchAll();


    // Work on pagination later. 
    $total = $db->query('SELECT COUNT(*) FROM fish')->fetchColumn();

    $limit = 10;
    
    $pages = ceil($total/$limit);

    //var_dump($pages);

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
            <?php $i = 0 ?><br>
            <form class="search" action="search.php">
                <input type="text" placeholder="Search fish" name="search">
                <button type="submit">Search</button>
            </form>
            
            <?php foreach(array_reverse($fish) as $curent): ?>
                <div class = "fish_post">           

                    <h2><?= $curent['commonName'] ?> </h2>

                    <?php if($curent['image']): ?>

                        <img src="data:image/gif;base64,<?php echo base64_encode($curent['image']);?>" /> <br>

                    <?php endif ?>
                    
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'a'): ?>
                        <p>
                            Date: <?=  $curent['date'] ?> <a href="edit.php?id=<?=$curent['fish_id'] ?>">edit </a> <br>
                        </p>
                    <?php else: ?>
                            Date: <?= $curent['date'] ?>
                    <?php endif ?>

                        <div class = "fish_content">

                            Tank Mates: <?= $curent['Tankmates'] ?> <br>
                            Aggression level: <?= $curent['Aggression'] ?> <br>
                            Full grown size: <?= $curent['Size'] ?>" <br>
                            pH: <?= $curent['pH'] ?> <br>
                            Water temperature: <?= $curent['Water_Temperature'] ?> F <br>
                            Swim position: <?= $curent['swimPosition'] ?> <br>

                            <a href="show.php?id=<?=$curent['fish_id'] ?>">Read More </a>

                        </div>
                </div>
                
                <?php $i++ ?>

                <?php if($i == 20) break; ?>

            <?php endforeach ?>
         
            
      
</div> <!-- END div id="wrapper" -->

<div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div>
</body>
</html>
