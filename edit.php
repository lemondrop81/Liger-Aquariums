<?php
    session_start();
    require 'connect.php';

    require 'validUsername.php';
    
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $urlName = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_SPECIAL_CHARS);

    $title = str_replace('-', ' ', $urlName);

    $query = "SELECT * FROM fish WHERE fish_id =:id AND commonName =:p";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement -> bindValue(':id', $id);
    $statement -> bindValue(':p', $title);
    $statement->execute(); // The query is now executed.
    $fish = $statement->fetchAll(); 
    
    $query = "SELECT * FROM swimPosition";
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
    <title>Liger Aquarium - Edit Fish</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Liger Aquarium - Edit Fish</a></h1>
        </div> <!-- END div id="header" -->

        <?php require 'menu.php' ?>
        
<div id="all_blogs">
  <form action="process_post.php" method="post">
    <fieldset>

    <?php $i = 0 ?>
            
            <?php foreach($fish as $curent): ?>
              <div class = "fish_post">   
      <p>
        <label for="fish_id">fish id: <?= $curent['fish_id'] ?></label>
        <input type="hidden" name="fish_id" id="fish_id" value="<?= $curent['fish_id'] ?>"/>
      </p>
      <p>
        <?php if($curent['image']): ?>
            <img src="data:image/gif;base64,<?php echo base64_encode($curent['image']);?>" />
            <input type="checkbox" name="test">
            <label for="test">Delete image</label>
          <?php endif ?>
      </p>
      <p>
        <label for="commonName">Name</label>
        <input name="commonName" id="commonName" value="<?= $curent['commonName'] ?>"/>
      </p>
      <p>
        <label> Swim Position</label>
        <select name="position" id="position">
            <?php foreach($position as $set): ?>
              <?php if($set['position'] == $curent['swimPosition']): ?>
                <option selected ><?= $set['position'] ?></option>
              <?php else: ?>
                <option><?= $set['position'] ?></option>
              <?php endif ?>
            <?php endforeach ?>
         </select>
      </p>
      <p>
        <label> Aggression </label>
        <select name="aggression" id="aggression">
            <?php foreach($aggression as $set): ?>
              <?php if($set['behaviour'] == $curent['Aggression']): ?>
                <option selected ><?=$set['behaviour'] ?></option>
              <?php else: ?>
                <option><?=  $set['behaviour'] ?></option>
              <?php endif ?>
            <?php endforeach ?>
         </select>
      </p>
      <p>
        <label> Tank Mates </label>
        <select name="tankmates" id="tankmates">
            <?php foreach($tankMates as $set): ?>
              <?php if($set['tankMates'] == $curent['Tankmates']): ?>
                <option selected><?=$set['tankMates'] ?></option>
              <?php else: ?>
                <option><?= $set['tankMates']?></option>
              <?php endif ?>
         <?php endforeach ?>
         </select>
      </p>
      <p>
        <label for="size">Full grown size</label>
        <input name="size" id="size" value="<?= $curent['Size'] ?>"/>
      </p>
      <p>
        <label for="ph">pH</label>
        <input name="ph" id="ph" value="<?= $curent['pH'] ?>"/>
      </p>
      <p>
        <label for="waterTemperature">Water Temperature</label>
        <input name="waterTemperature" id="waterTemperature" value="<?= $curent['Water_Temperature'] ?>"/>
      </p>
      <?php $i++ ?>
              </div>

                <?php if($i == 1) break; ?>

            <?php endforeach ?>
      <p>
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
