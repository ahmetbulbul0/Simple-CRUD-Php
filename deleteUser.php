<?php

session_start();
require_once("./database.php");

if (!isset($_GET["username"]) || $_GET["username"] == null) {
    header("Location: users.php");
}

$username = $_GET["username"];

$user = $mysqli->query("SELECT * FROM users WHERE username = '$username'");

if ($user->num_rows == 0) {
    header("Location: users.php");
}

$mysqli->query("DELETE FROM users WHERE username = '$username'");

$_SESSION["userDeleteSuccess"] = "User successfully deleted";

header("Location: users.php");