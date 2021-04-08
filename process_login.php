<?php
    require ('connect.php');

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);

    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $statement->execute(); // The query is now executed.
    $position= $statement->fetchAll();


    if($position != null)
    {
        foreach($position as $curent)
        {
            if(password_verify($password, $curent['password']))
            {
                session_start();
                $_SESSION['username'] = $username;

                foreach($position as $current){
                    $_SESSION['role'] = $current['role'];
                }
            }
        }        
    }

    header("Location: homepage.php");

?>