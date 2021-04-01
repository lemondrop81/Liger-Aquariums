<?php

require ('connect.php');

$submit = $_POST['command'];

$commonName = filter_var($_POST['commonName'], FILTER_SANITIZE_SPECIAL_CHARS);

$aggression = filter_var($_POST['aggression'], FILTER_SANITIZE_SPECIAL_CHARS);

$tankmates = filter_var($_POST['tankmates'], FILTER_SANITIZE_SPECIAL_CHARS);

$size = filter_var($_POST['size'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$ph = filter_var($_POST['ph'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$waterTemperature = filter_var($_POST['waterTemperature'], FILTER_SANITIZE_NUMBER_FLOAT);

$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_SPECIAL_CHARS);

$swimPosition = filter_var($_POST['position'], FILTER_SANITIZE_SPECIAL_CHARS);



// Work on file upload
$image_upload_detected = isset($_FILES['image']) && ($_FILES['image']['error'] === 0);

var_dump($image_upload_detected);

    if ($image_upload_detected) { 
        $image_filename       = $_FILES['image']['name'];
        $temporary_image_path = $_FILES['image']['tmp_name'];

        if (file_is_an_image($temporary_image_path, $image_filename)) { 

            $imageContent = addslashes(file_get_contents($temporary_image_path));

        }
    }

    function file_is_an_image($temporary_path, $image_filename) {

        $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png'];
        $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png'];
        
        $actual_file_extension   = pathinfo($image_filename, PATHINFO_EXTENSION);
        $actual_mime_type        = getimagesize($temporary_path)['mime'];
        
        $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
        $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);
        
        return $file_extension_is_valid && $mime_type_is_valid;
    }

if(strlen($commonName) == 0  || strlen($aggression) == 0 || strlen($tankmates) == 0 || strlen($size) == 0 || strlen($ph) == 0 ||  strlen($waterTemperature) == 0 || strlen($user_name) == 0 || strlen($swimPosition) == 0)
{

}
else
{
    $query = "INSERT INTO fish (commonName, Aggression, Tankmates, Size, pH, Water_Temperature, user_name, swimPosition, image) 
    values ('$commonName', '$aggression', '$tankmates', '$size', '$ph', '$waterTemperature', '$user_name', '$swimPosition', '$imageContent')";
    $statement = $db->prepare($query);
    $statement->execute();


}
?>