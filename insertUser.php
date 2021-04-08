<?php

require ('connect.php');

$submit = $_POST['command'];

$username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);

$password1 = filter_var($_POST['password1'], FILTER_SANITIZE_SPECIAL_CHARS);

$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_SPECIAL_CHARS);

$role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

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
                    VALUES ('$username', '$encryptedPassword', '$role')";

            $statement = $db->prepare($insert);
            $statement->execute();
        }
    }

    header("Location: users.php");

?>