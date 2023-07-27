<?php

session_start();
require_once("./connectDatabase.php");

if (isset($_POST["addUser"])) {
    $firstName = htmlspecialchars(strtolower($_POST["first_name"]));
    $lastName = htmlspecialchars(strtolower($_POST["last_name"]));
    $username = htmlspecialchars(strtolower($_POST["username"]));
    $email = htmlspecialchars(strtolower($_POST["email"]));
    $phone = htmlspecialchars(strtolower($_POST["phone"]));

    $_SESSION["userCreateInputs"]["firstName"] = $firstName;
    $_SESSION["userCreateInputs"]["lastName"] = $lastName;
    $_SESSION["userCreateInputs"]["username"] = $username;
    $_SESSION["userCreateInputs"]["email"] = $email;
    $_SESSION["userCreateInputs"]["phone"] = $phone;

    $usernameCheck = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
    if ($usernameCheck->num_rows > 0) {
        $_SESSION["userCreateErrors"]["username"] = "this username has been taken";
    }

    $mailCheck = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
    if ($mailCheck->num_rows > 0) {
        $_SESSION["userCreateErrors"]["email"] = "this email address has been taken";
    }

    if ($phone != "") {
        $phoneCheck = $mysqli->query("SELECT * FROM users WHERE phone = '$phone'");
        if ($phoneCheck->num_rows > 0) {
            $_SESSION["userCreateErrors"]["phone"] = "this phone number has been taken";
        }
    } else {
        $phone = NULL;
    }

    if (isset($_SESSION["userCreateErrors"])) {
        header("Location: ../?p=new-user");
    }

    if (!isset($_SESSION["userCreateErrors"])) {
        if ($phone == null) {
            $userCreate = $mysqli->query("INSERT INTO users (first_name, last_name, username, email) VALUES ('$firstName', '$lastName', '$username','$email')");
        } else {
            $userCreate = $mysqli->query("INSERT INTO users (first_name, last_name, username, email, phone) VALUES ('$firstName', '$lastName', '$username','$email', '$phone')");
        }
        session_destroy();
        session_start();
        $_SESSION["userCreateSuccess"] = "User created successfully";
        header("Location: ../");
    }
    
} else {
    header("Location: ../");
}