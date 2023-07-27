<?php

session_start();
require_once("./connectDatabase.php");

if (!isset($_GET["username"]) || $_GET["username"] == null) {
    header("Location: ../");
}

$username = $_GET["username"];

$user = $mysqli->query("SELECT * FROM users WHERE username = '$username'");

if ($user->num_rows == 0) {
    header("Location: ../");
}

$mysqli->query("DELETE FROM users WHERE username = '$username'");

$_SESSION["userDeleteSuccess"] = "User successfully deleted";

header("Location: ../");