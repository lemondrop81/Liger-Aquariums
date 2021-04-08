<?php
session_start();

require ('connect.php');

$submit = $_POST['command'];

$commonName = filter_var($_POST['commonName'], FILTER_SANITIZE_SPECIAL_CHARS);

$aggression = filter_var($_POST['aggression'], FILTER_SANITIZE_STRING);

$tankmates = filter_var($_POST['tankmates'], FILTER_SANITIZE_STRING);

$size = filter_var($_POST['size'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$ph = filter_var($_POST['ph'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$waterTemperature = filter_var($_POST['waterTemperature'], FILTER_SANITIZE_NUMBER_FLOAT);

$fish_id = filter_var($_POST['fish_id'], FILTER_SANITIZE_NUMBER_INT);

$swimPosition = filter_var($_POST['position'], FILTER_SANITIZE_SPECIAL_CHARS);


if(isset($_POST['test']))
{
    $image = null;
}



if($submit == "Update")
{         
    $query = "UPDATE fish SET commonName = :commonName, Aggression = :Aggression, Tankmates = :Tankmates, Size = :Size, pH = :pH, Water_Temperature = :Water_Temperature, swimPosition = :swimPosition, image =:image WHERE fish_id = :fish_id ";


    $statement = $db->prepare($query);

    $statement->bindValue('commonName', $commonName);
    $statement->bindValue('Aggression', $aggression);
    $statement->bindValue('Tankmates', $tankmates);
    $statement->bindValue('Size', $size);
    $statement->bindValue('pH', $ph);
    $statement->bindValue('Water_Temperature', $waterTemperature);

    $statement->bindValue('fish_id', $fish_id);
    $statement->bindValue('swimPosition', $swimPosition);
    $statement->bindValue('image',$image);

    $statement->execute();

}

if($submit == "Delete" && $_SESSION['role'] == "a")
{
    // Delete
    $query = "DELETE FROM fish WHERE fish_id = $fish_id";
    $statement = $db->prepare($query);
    $statement->execute();
}
    header("Location: homepage.php");

?>
