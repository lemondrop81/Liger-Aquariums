<?php
session_start();

require ('connect.php');

$submit = $_POST['command'];

$user_id = filter_var($_POST['User_Id'], FILTER_SANITIZE_NUMBER_INT);

$username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);

$password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

$role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);


if($submit == "Update")
{         
    $query = "UPDATE users SET username = :username, password = :password, role = :role WHERE User_Id = :User_Id ";


    $statement = $db->prepare($query);

    $statement->bindValue('username', $username);
    $statement->bindValue('password', $password);
    $statement->bindValue('role', $role);
    $statement->bindValue('User_Id', $user_id);

    $statement->execute();

}


if($submit == "Delete")
{
    // Delete
    $query = "DELETE FROM users WHERE User_Id = $user_id";
    $statement = $db->prepare($query);
    $statement->execute();
}

//header("Location: homepage.php");

?>