<?php
  session_start();
  require 'validUsername.php';

  require ('connect.php');

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
    <title>Liger Aquariums - New fish</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Liger Aquariums - New Fish</a></h1>
        </div> <!-- END div id="header" -->

        <?php require 'menu.php' ?>

<div id="all_blogs">
  <form action="insert.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>Add new fish</legend>
      <p>
        <label for="commonName">Name</label>
        <input name="commonName" id="commonName" />
      </p>
      <p>
        <label> Swim Position</label>
        <select name="position" id="position">
                    <option> Select State </option>
            <?php foreach($position as $curent): ?>
            <label> Select State </label>
                    <option><?=  $curent['position'] ?></option>
         <?php endforeach ?>
         </select>
      </p>
      <p>
        <label> Aggression </label>
        <select name="aggression" id="aggression">
                    <option> Select State </option>
            <?php foreach($aggression as $curent): ?>
            <label> Select State </label>
                    <option><?=  $curent['behaviour'] ?></option>
         <?php endforeach ?>
         </select>
      </p>
      <p>
        <label> Tank Mates </label>
        <select name="tankmates" id="tankmates">
                    <option> Select State </option>
            <?php foreach($tankMates as $curent): ?>
            <label> Select State </label>
                    <option><?=  $curent['tankMates'] ?></option>
         <?php endforeach ?>
         </select>
      </p>
      <p>
        <label for="size">Full grown size</label>
        <input name="size" id="size" />
      </p>
      <p>
        <label for="ph">pH</label>
        <input name="ph" id="ph" />
      </p>
      <p>
        <label for="waterTemperature">Water Temperature</label>
        <input name="waterTemperature" id="waterTemperature" />
      </p>
      <p>
        <label for="user_name">User Name: <?= $_SESSION['username'] ?></label>
        <input type="hidden" name="user_name" id="user_name" value="<?= $_SESSION['username'] ?>"/>
      </p>
      <p>
        <label for="image">Image Filename:</label>
        <input type="file" name="image" id="image">
      </p>
      <p>
        <input type="submit" name="command" value="Create" />
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
