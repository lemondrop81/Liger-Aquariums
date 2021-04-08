<?php
require ('connect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "DELETE FROM comments WHERE id = $id";
    $statement = $db->prepare($query);
    $statement->execute();

    // Return to this screen
    $query = "SELECT * FROM comments WHERE id =:id";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $comments = $statement->fetchAll(); 

    var_dump($comments);
    header("Location: show?.php");

?>