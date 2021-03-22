<?php

$commonName = filter_var($_POST['commonName'], FILTER_SANITIZE_SPECIAL_CHARS);

$aggression = filter_var($_POST['aggression'], FILTER_SANITIZE_SPECIAL_CHARS);

$tankmates = filter_var($_POST['tankmates'], FILTER_SANITIZE_SPECIAL_CHARS);

$size = filter_var($_POST['size'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$ph = filter_var($_POST['ph'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$waterTemperature = filter_var($_POST['waterTemperature'], FILTER_SANITIZE_NUMBER_FLOAT);

$userId = filter_var($_POST['userId'], FILTER_SANITIZE_SPECIAL_CHARS);

$swimPosition = filter_var($_POST['position'], FILTER_SANITIZE_SPECIAL_CHARS);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Liger Aquariums</title>
</head>
<body>

    <?php require ('connect.php'); ?>

    <?php if(strlen($commonName) == 0  || strlen($aggression) == 0 || strlen($tankmates) == 0 || strlen($size) == 0 || strlen($ph) == 0 ||  strlen($waterTemperature) == 0 || strlen($userId) == 0 || strlen($swimPosition) == 0){ ?>
        <?php header("Location: homepage.php"); ?>

    <?php } else { ?>
        <?php  $query = "INSERT INTO fish (commonName, Aggression, Tankmates, Size, pH, Water_Temperature, user_Id, swimPosition) 
        values ('$commonName', '$aggression', '$tankmates', '$size', '$ph', '$waterTemperature', '$userId', '$swimPosition')"; ?>
        <?php $statement = $db->prepare($query); ?>
        <?php $statement->execute(); ?>

    <?php } ?>

    <?php header("Location: homepage.php"); ?>

</body>
</html>