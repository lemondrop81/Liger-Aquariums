<?php
    require ('connect.php');
    
    session_start();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $urlName = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_SPECIAL_CHARS);

    $title = str_replace('-', ' ', $urlName);
    
    $query = "SELECT * FROM fish WHERE fish_id =:id AND commonName =:p";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement -> bindValue(':id', $id);
    $statement -> bindValue(':p', $title);
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
    
    $query = "SELECT * FROM comments WHERE fish_id = $_GET[id]";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $comments= $statement->fetchAll(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums - Show Fish</title>

    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Liger Aquariums - show Fish</a></h1>
        </div> <!-- END div id="header" -->

        <?php require_once 'menu.php' ?>

        <div id="all_blogs">
                
        <?php foreach(array_reverse($fish) as $curent): ?>
            <div class = "fish_post">
                <h2><?= $curent['commonName'] ?> </h2>

                <?php if($curent['image']): ?>

                    <img src="data:image/gif;base64,<?php echo base64_encode($curent['image']);?>" /> <br>

                <?php endif ?>
                <div class="noprint">
                        <?= $urlFancy = $curent['commonName']?>
                        <?= $urlFancy = str_replace(' ', '-', $urlFancy)?>
                    </div>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'a'): ?>
                    <p>
                    Date: <?=  $curent['date'] ?> <a href="edit.php?id=<?=$curent['fish_id']?>&p=<?=$urlFancy?>">edit </a> <br>
                    </p>
                <?php else: ?>
                        Date: <?= $curent['date'] ?>
                <?php endif ?>

                    <div class = "fish_content">
                        Posted by: <?= $curent['user_name'] ?> <br>
                        Tank Mates: <?= $curent['Tankmates'] ?> <br>
                        Aggression level: <?= $curent['Aggression'] ?> <br>
                        Full grown size: <?= $curent['Size'] ?>" <br>
                        pH: <?= $curent['pH'] ?> <br>
                        Water temperature: <?= $curent['Water_Temperature'] ?> F <br>
                        Swim position: <?= $curent['swimPosition'] ?> <br>
                    </div>
            </div>  

        <?php endforeach ?>               
      
    </div> <!-- END div id="wrapper" -->
    <br>
    <br>

    <?php if(isset($_SESSION['username'])): ?>
        <form action="newComment.php" method="post">
            <textarea name="comment" placeholder="Insert comment here"></textarea>
            
            <?php foreach(array_reverse($fish) as $curent): ?>
                <input type="hidden" name="fish_id" id="fish_id" value="<?= $curent['fish_id'] ?>"/>
            <?php endforeach ?>

            <input type="submit" name="command" value="Add Comment" />
        </form> 
    <?php  endif ?> 

        <?php foreach(array_reverse($comments) as $curent): ?> 
            <div id="comments">
                <p><?= $curent['date'] ?> posted by <?= $curent['username'] ?></p>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'a'): ?> 
                    <a href="removeComment.php?id=<?=$curent['id'] ?>">Remove Comment </a>
                <?php endif ?>
                <p><?= $curent['comment'] ?></p>

            </div>
        <?php endforeach ?>            

    

        <div id="footer">
            Liger Aquariums 2021
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->            
                
</body>
</html>
