<?php
    require ('connect.php');
    session_start();

    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    $id = filter_var($_POST['fish_id'], FILTER_SANITIZE_NUMBER_INT);
    $username = $_SESSION['username'];

    var_dump($username);


    $query = "INSERT INTO comments (fish_id, comment, username) VALUES ('$id', '$comment', '$username')";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
   
    header("Location: index.php");
?>