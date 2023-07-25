<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "php_crud";

try {
    $mysqli = mysqli_connect($hostname, $username, $password, $database);
} catch (\Throwable $th) {
    die("Connection Failed, Please correct your database information");
} 

// $getUsers = $mysqli->query("SELECT * FROM users");
// $users = $getUsers->fetch_all(MYSQLI_ASSOC);
// $addUser = $mysqli->query("INSERT INTO users (first_name, last_name, username, email) VALUES ('ahmet', 'bülbül', 'ahmetbulbul','ahmetbulbul@protonmail.com')");
// $updateUser = $mysqli->query("UPDATE users SET username = 'ahmetbulbul' WHERE id = 1");
// $deleteUser = $mysqli->query("DELETE FROM users WHERE id = 1");

// $mysqli->close();