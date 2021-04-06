<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums - New Category</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="homepage.php">Liger Aquariums - New Category</a></h1>
        </div> <!-- END div id="header" -->

        <?php require 'menu.php' ?>

<div id="all_blogs">
  <form action="newCategory.php" method="post">
    <fieldset>
      <legend>Add new category</legend>
      <p>
        <label for="swimPosition">Swim Position</label>
        <input name="swimPosition" id="swimPosition" />
      </p>
      <p>
        <label for="aggression">Aggression</label>
        <input name="aggression" id="aggression" />
      </p>
      <p>
        <label for="tankmates">Tanmates</label>
        <input name="tankmates" id="tankmates" />
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
