<?php
require ('connect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "DELETE FROM comments WHERE id = $id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    // Return to this screen
    $query = "SELECT * FROM comments WHERE id =:id";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute(); // The query is now executed.
    $comments = $statement->fetchAll(); 

    ob_start(); Header('Location: index.php'); ob_end_flush();

?>