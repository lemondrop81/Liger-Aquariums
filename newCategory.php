<?php

require ('connect.php');

$swimPosition = filter_var($_POST['swimPosition'], FILTER_SANITIZE_STRING);

$aggression = filter_var($_POST['aggression'], FILTER_SANITIZE_STRING);

$tankmates = filter_var($_POST['tankmates'], FILTER_SANITIZE_STRING);

if($swimPosition != "")
{
    $query = "SELECT * FROM swimPosition WHERE position = '$swimPosition'";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $position= $statement->fetchAll();

    if($position == null)
    {
        $new = "INSERT INTO swimposition (position) VALUES ('$swimPosition')";
        $swim = $db->prepare($new); // Returns a PDOStatement object.
        $swim->execute(); // The query is now executed.
        $swimming= $swim->fetchAll();
    }
}

if($aggression != "")
{
    $query = "SELECT * FROM aggression WHERE behaviour = '$aggression'";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $position= $statement->fetchAll();

    if($position == null)
    {
        $new = "INSERT INTO aggression (behaviour) VALUES ('$aggression')";
        $swim = $db->prepare($new); // Returns a PDOStatement object.
        $swim->execute(); // The query is now executed.
        $aggression= $swim->fetchAll();
    }
}

if($tankmates != "")
{
    $query = "SELECT * FROM tankmates WHERE tankMates = '$tankmates'";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $position= $statement->fetchAll();

    if($position == null)
    {
        $new = "INSERT INTO tankmates (tankMates) VALUES ('$tankmates')";
        $swim = $db->prepare($new); // Returns a PDOStatement object.
        $swim->execute(); // The query is now executed.
        $aggression= $swim->fetchAll();
    }
}

?>