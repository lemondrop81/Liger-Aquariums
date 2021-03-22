<?php
    require ('connect.php');

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);

    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $position= $statement->fetchAll();

    if($position != null)
    {
        session_start();
        $_SESSION['username'] = $username;

        foreach($position as $current){
            $_SESSION['role'] = $current['role'];
        }
        
    }

    var_dump($_SESSION['role']);

    header("Location: homepage.php");

?>