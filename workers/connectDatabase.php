<?php

$db["hostname"] = "localhost";
$db["username"] = "root";
$db["password"] = "";
$db["database"] = "php_crud";

try {
    $mysqli = mysqli_connect($db["hostname"], $db["username"], $db["password"], $db["database"]);
} catch (\Throwable $th) {
    die("Connection Failed, Please correct your database information");
} 

// $mysqli->close();

?>