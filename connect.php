<?php

define('DB_DSN','mysql:host=localhost;dbname=id16609509_serverside');
define('DB_USER','id16609509_admin');
define('DB_PASS','~9mJG9F%2P@)69!V');    



try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
    print "Error: " . $e->getMessage();
    die(); // Force execution to stop on errors.
}

?>