<?php

session_start();
require_once("./workers/connectDatabase.php");

if (isset($_GET["p"]) && $_GET["p"] != null) {
    $page = $_GET["p"];
    switch ($page) {
        case 'new-user':
            require_once("./pages/newUser.php");
            break;
        case 'user-delete':
            require_once("./pages/userDelete.php");
            break;
        default:
            require_once("./pages/usersList.php");
            break;
    }
} else {
    require_once("./pages/usersList.php");
}
