<?php
    if(!isset($_SESSION['username'])){
        echo("You have to be logged in to edit pages or make new posts");
        echo nl2br("\n redirecting you to the login page in 5 seconds");
        header('Refresh: 5; URL=login.php');
        exit();
      }
?>