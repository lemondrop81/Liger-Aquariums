<?php

    require ('connect.php');
    $submit = $_POST['command'];

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);

    $password1 = filter_var($_POST['password1'], FILTER_SANITIZE_SPECIAL_CHARS);

    $password2 = filter_var($_POST['password2'], FILTER_SANITIZE_SPECIAL_CHARS);

    if(strcmp($password1, $password2) == 0)
    {    
        $query = "SELECT * FROM users WHERE username = '$username'";
        $statement = $db->prepare($query); // Returns a PDOStatement object.
        $statement->execute(); // The query is now executed.
        $position= $statement->fetchAll();

        if($position == null)
        {
            $encryptedPassword = password_hash($password1, PASSWORD_DEFAULT);

            $insert = "INSERT INTO users (username, password, role) 
                    VALUES ('$username', '$encryptedPassword', 'c')";
            $statement = $db->prepare($insert);
            $statement->execute();

            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'c';
        }
    } else 
    {
        echo('The password are different'); 
        echo nl2br("\nYou will be redirected back to the registration page in 10 seconds");
        header('Refresh: 10; URL=registration.php');
    }

    header("Location: index.php");


?>